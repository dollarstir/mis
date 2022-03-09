<?php

class Inser extends database
{
    public function insert($table, $records, $files = null)
    {
        $man = '';
        $vv = '';
        $flag = false;
        var_dump($files);
        if (!is_null($files)) {
            if (count($files) > 0) {
                foreach ($files as $name => $file) {
                    if ($flag) {
                        break;
                    } elseif ($file['size'] <= 0) {
                        break;
                    }
                    $oldfilename = $file['name'];
                    $filetype = array_reverse(explode('/', $file['type']))[0];
                    $newfilename = time().'.'.$filetype;
                    if (move_uploaded_file($file['tmp_name'], 'upload/'.$newfilename)) {
                        $records[$name] = $newfilename;
                    } else {
                        $flag = true;
                    }
                }
            }
        }
        if (!$flag) {
            foreach ($records as $key => $value) {
                $man .= $key.',';
                $vv .= ':'.$key.',';

                // $fields[] = $key;
            // $values[] = "'".$value."'";
            }
            $man = rtrim($man, ',');
            $vv = rtrim($vv, ',');
            $ins = $this->conn->prepare("INSERT INTO $table ($man) VALUES ($vv)");

            foreach ($records as $key => $value) {
                $ins->bindValue(':'.$key, $value); // $fields[] = $key;
                // $values[] = "'".$value."'";
            }
            $ins->execute();
            // var_dump($ins);
            // var_dump($man);
            // var_dump($vv);
        }

        // var_dump()
    }
}
