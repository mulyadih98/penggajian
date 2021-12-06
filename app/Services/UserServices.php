<?php
namespace App\Services;

use App\Models\Jabatan;
use App\Models\User;
use App\Models\UserDetail;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserServices {
    public function getByEmail($email){
        return User::where('email',$email)->first();
    }

    public function add(Array $data){
        $user = [
            'nip' => $data['nip'],
            'email' => $data['email'],
            'jabatan_id' => $data['jabatan_id'],
            'password' => bcrypt(substr($data['nip'],0,6))
        ];

        $userDetail = [
            "nama_lengkap" => $data['nama_lengkap'],
            "tempat_lahir" => $data['tempat_lahir'],
            "tanggal_lahir" => $data['tanggal_lahir'],
            "alamat" => $data['alamat'],
            "no_telepon" => $data['no_telepon'],
            "agama" => $data['agama']
        ];

        return User::create($user)->detail()->create($userDetail);
    }

    public function getAll(){
        $user = User::with(['jabatan', 'detail'])->get();
        return $user;
    }

    public function getById(Int $id) {
        $user = User::where('id', $id)->first();
        if(!$user){
            throw new NotFoundHttpException("Resource Not Found");
        }

        $user->load('detail','jabatan');

        return $user;
    }

    public function update(Int $id, Array $data) {
        $user = $this->getById($id);
        $dataUser = [
            'nip' => $data['nip'],
            'email' => $data['email'],
            'jabatan_id' => $data['jabatan_id']
        ];
        
        
        $user->update($dataUser);

        if(!$user) {
            throw new Exception('Error in update data.');
        }
        
        if(!$this->detailUpdate($user->id, $data)){
            throw new Exception('Error in update data.');
        }

        return $user;
    }

    public function delete(Int $id) {
        $user = $this->getById($id)->delete();
        return $user;
    }

    public function resetPassword(Int $id) {
        $user = $this->getById($id);
        $data = ['password' => bcrypt(substr($user->nip,0,6))];
        $user->update($data);
        if(!$user) {
            throw new Exception('Error in update data.');
        }
        return $user;
    }

    public function detailUpdate(Int $id, Array $data) {
        $dataDetail = [
            "nama_lengkap" => $data['nama_lengkap'],
            "tempat_lahir" => $data['tempat_lahir'],
            "tanggal_lahir" => $data['tanggal_lahir'],
            "alamat" => $data['alamat'],
            "no_telepon" => $data['no_telepon'],
            "agama" => $data['agama']
        ];
        return UserDetail::where('user_id', $id)->update($dataDetail);
    }
}