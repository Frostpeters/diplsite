<?php

class load_lexicons
{
    public function load($file)
    {
        if (file_exists(__DIR__ . "/../../../files/" . $file)) {
            $data = file(__DIR__ . "/../../../files/" . $file);
            if (file_exists(__DIR__ . "/../../../files/new_lex.txt")) {
                $created_data = file(__DIR__ . "/../../../files/new_lex.txt");
                foreach ($created_data as $key => $value) {
                    if (empty(trim($value))) {
                        unset($created_data[$key]);
                    } else {
                        $created_data[$key] = str_replace("\n", '', $value);
                    }
                }
            } else {
                $created_data = [];
            }
            $conf = [
                '-5' => '-2.3	0.45826	[-3, -3, -2, -2, -2, -2, -3, -2, -2, -2]',
                '5' => '2.3	1.26886	[0, 4, 3, 3, 4, 1, 2, 2, 1, 3]',
                '2.5' => '1.5	0.67082	[1, 2, 1, 2, 1, 1, 2, 1, 3, 1]',
                '-2.5' => '-1.4	0.4899	[-1, -1, -2, -1, -1, -1, -2, -2, -2, -1]',
                '-3.3' => '-1.8	0.6	[-2, -1, -1, -2, -2, -2, -3, -2, -1, -2]',
                '3.3' => '1.9	0.9434	[2, 1, 2, 2, 2, 0, 2, 2, 4, 2]',
                '-1.7' => '-0.8	0.9798	[-1, -1, -2, -1, 2, -1, -1, -1, -1, -1]',
                '1.7' => '0.9	1.64012	[1, -1, 0, 0, 1, 3, -2, 3, 1, 3]',
                '1' => '1.9	0.9434	[2, 1, 2, 2, 2, 0, 2, 2, 4, 2]',
                '-1' => '-1.8	0.6	[-2, -1, -1, -2, -2, -2, -3, -2, -1, -2]',
            ];
            if (!empty($data)) {
                foreach ($data as $value) {
                    $value = explode(',', $value);
                    if (isset($conf[trim($value[1])])) {
                        $write = true;
                        if (!empty($created_data)) {
                            foreach ($created_data as $done_data) {
                                $done_data = explode('	', $done_data);
                                if (trim($done_data[0]) == trim($value[0])) {
                                    $write = false;
//                                    print_r($value[0]."\n");
                                }
                            }
                        }
                        if ($write) {
                            $created_data[] = $value[0] . '	' . $conf[trim($value[1])];
                        }
                    }
                }
                $fp = fopen(__DIR__ . "/../../../files/new_lex.txt", "w+");
                fwrite($fp, implode("\n", $created_data));
            }
            print_r($created_data);
            die;
        } else {
            die("FILE: {$file} not exist");
        }
    }
}

$load = new load_lexicons();

echo "Enter name of file";
$start = readline(": ");
if (isset($start) && $start) {
    $load->load($start);
}


