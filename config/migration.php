<?php

pdo_query("CREATE TABLE IF NOT EXISTS `settings` (
  `id` varchar(255) NOT NULL,
  `data` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

$data = pdo_query("select * from `settings` where `id` = 'cms_appdb_version' ");

if(empty($data[0])){
    pdo_query("insert into `settings` (`id`, `data`) values ('cms_appdb_version', ?)", ['1.0']);
    $data[0]['data'] = '1.0';
}

migration_db_querys($data[0]['data']);

function migration_db_querys($currentVersion = 1){
    // тут поступаем также как для версий модулей
    $q = [];
    $q['1.001'][] = "create table if not exists `results`(
`id` int not null auto_increment,
`search_id` int not null,
`text` varchar(255) default null,
`processing_result` varchar(255) default null,
`type_result` varchar(255) default null,
`page` varchar(255) default null,
primary key(`id`)

)ENGINE=MyISAM DEFAULT CHARSET=utf8";
    $q['1.002'][] = "create table if not exists `search`(
`id` int not null auto_increment,
`search_text` varchar(255) default null,
`created` datetime DEFAULT CURRENT_TIMESTAMP,
primary key(`id`)
)";

    $actualVersion = $currentVersion;
    // убираем лишнеее
    foreach($q as $ver => $data)
        if((float)($ver) <= $currentVersion) unset($q[$ver]);
        elseif($ver > $actualVersion) $actualVersion = $ver; // вычисляем максимальную версию

    if($actualVersion > $currentVersion){
        // значит нужно выполнять запросы и увеличивать версию в Базе
        foreach($q as $ver => $data)
            foreach($data as $query) pdo_query($query);

        pdo_query("update `settings` set `data` = ? where `id` = ?", [$actualVersion, 'cms_db_version']);
    }
}