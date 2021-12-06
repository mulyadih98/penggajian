<?php
namespace App\Services;

use App\Models\Jabatan;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JabatanServices {
    public function add(Array $data) {
        $jabatan = new Jabatan($data);
        $jabatan->save();
        if(!$jabatan){
            throw new Exception('Terjadi Kesalahan Saat Menyimpan Jabatan');
        }
        return $jabatan;
    }

    public function getById(Int $id){
        $jabatan = Jabatan::where('id',$id)->first();
        if(!$jabatan){
            throw new NotFoundHttpException("Resource Not Found");
        }

        return $jabatan;
    }

    public function getAll(){
        return Jabatan::all();
    }

    public function update(Int $id, Array $data) {
        $jabatan = $this->getById($id)->update($data);
        if(!$jabatan){
            throw new Exception('Terjadi Kesalahan Saat Menyimpan Jabatan');
        }
        return $jabatan;
    }

    public function delete(Int $id){
        $jabatan = $this->getById($id)->delete();
        if(!$jabatan){
            throw new Exception('Terjadi Kesalahan Saat Menyimpan Jabatan');
        }
        return $jabatan;
    }
}