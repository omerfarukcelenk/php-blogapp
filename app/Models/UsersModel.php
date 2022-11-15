<?php

namespace App\Models;

use App\Entities\UserEntitiy;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = UserEntitiy::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_name', 'user_email', 'user_phone', 'user_age', 'user_status', 'user_password', 'user_profile_picture'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'user_name' => 'required|string|min_length[3]',
        'user_email' => 'required|valid_email|is_unique[users.user_email]',
        'user_phone' => 'required|numeric|min_length[10]|max_length[13]|is_unique[users.user_phone]'
    ];
    protected $validationMessages = [
        'user_name' => [
            'required' => 'Zorunlu alanları doldurunuz',
            'string' => 'Kullanıcı adı alfabetik karakterler barındırmalıdır.',
            'min_length' => 'en az 3 karakter barındırmalıdır'
        ],
        'user_email' => [
            'required' => 'Zorunlu alanları doldurunuz',
            'valid_email' => 'email kurallarına uyunuz',
            'is_unique' => 'daha önce kullanılmış bir mail giremezsiniz'
        ],
        'user_phone' => [
            'required' => 'Zorunlu alanları doldurunuz',
            'numeric' => 'numara olarak giriniz',
            'min_length' => 'minumum 10 karakter giriniz',
            'max_length' => 'maxiumum 11 karakter giriniz',
            'is_unique' => 'daha önce kullanılmış bir telefon numarası giremezsiniz'
        ],
    ];
    protected $skipValidation = false;
    protected $allowCallbacks = true;

    protected $beforeInsert = ['passwordHash', 'phonePrefix'];
    protected $afterInsert = ['verificationInsert'];
    protected $beforeUpdate = ['passwordHash', 'phonePrefix'];
    protected $afterUpdate = [];
    protected $beforeDelete = [];
    protected $afterDelete = ['verificationInsert'];

    protected function passwordHash($data)
    {
        $data['data']['user_password'] = password_hash($data['data']['user_password'], PASSWORD_DEFAULT);
        return $data;
    }

    protected function phonePrefix($data)
    {
        $firstChar = substr($data['data']['user_phone'], 0, 1);
        if ($firstChar == '0') {
            $data['data']['user_phone'] = "+9" . $data['data']['user_phone'];
        }
        return $data;
    }

    protected function verificationInsert($data)
    {
        helper('text');
        $verifyModel = new VerificationModel();
        $verifyModel->insert([
            'user_id' => $data['id'],
            'verif_key' => random_string('alnum', 12),
            'verif_phone_code' => random_string('numeric', 6)
        ]);
    }

    protected function verificationDelete($data)
    {
        $verifyModel = new VerificationModel();
        $verifyModel->where('user_id', $data['id'][0])->delete();
    }

    public function getUserList()
    {
        $query = $this->db->query("SELECT * FROM users");

        return $query->getResult(UserEntitiy::class);
    }

    public function getUser($id = null)
    {
        $sql = 'SELECT * FROM users WHERE id = :id:';
        $query = $this->db->query($sql, [
            'id' => $id
        ]);

        return $query->getFirstRow(UserEntitiy::class);
    }

    public function insertUser($user_name, $user_email, $user_phone, $user_age)
    {
        $sql = "INSERT INTO users (user_name, user_email, user_phone, user_age) VALUES ('$user_name', '$user_email',' $user_phone', '$user_age')";
        $query = $this->db->query($sql);


        return $query;
    }


    public function getUserSelect($id = null)
    {
        $sql = 'SELECT user_name, user_email, user_phone, user_age FROM users WHERE id = :id:';
        $query = $this->db->query($sql, [
            'id' => $id
        ]);
        return $query->getFirstRow(UserEntitiy::class);

    }

    public function getUserMaxAge()
    {
        $builder = $this->builder($this->table);
        $builder = $builder->selectMax('user_age');
        $builder = $builder->get();
        return $builder->getResult(UserEntitiy::class);
    }


}