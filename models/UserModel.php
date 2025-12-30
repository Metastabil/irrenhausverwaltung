<?php
namespace App\Models;

class UserModel extends BaseModel {
    private string $folder = 'users';

    public function select(int $id = 0, string $email = '', bool $deleted = false) :array {
        $params['deleted'] = $deleted;

        if ($id > 0) {
            $query = $this->query($this->folder, 'select-by-id');
            $params['id'] = $id;
        }
        elseif (!empty($email)) {
            $query = $this->query($this->folder, 'select-by-email');
            $params['email'] = $email;
        }
        else {
            $query = $this->query($this->folder, 'select');
        }

        $statement = $this->db->prepare($query);
        $statement->execute($params);

        $result = $statement->fetchAll();

        return !empty($result) && ($id > 0 || !empty($email)) ? $result[0] : $result;
    }

    public function insert(array $data) :int|bool {
        $query = $this->query($this->folder, 'insert');

        if ($this->db->prepare($query)->execute($data)) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function update(array $data) :bool {
        $query = $this->query($this->folder, 'update');

        return $this->db->prepare($query)->execute($data);
    }
}
