<?php
namespace App\Services;

use App\Models\Gaji;
use App\Models\Potongan;
use App\Models\User;

class GajiService {
    public function getAll($periode){
        $periode = explode('-', $periode);
        $tahun = $periode[0];
        $bulan = $periode[1];
        $users = User::with('jabatan','detail')->get();
        $data = [];
        $i = 0;
        foreach($users as $user){
            $data[$i] = $user;
            $gaji = Gaji::where('user_id', $user->id)->whereYear('periode', '=', $tahun)->whereMonth('periode', '=', $bulan)->first();
            $gaji['status'] = $gaji ? true : false;
            $data[$i]['gaji'] = $gaji;
            $data[$i]['periode'] = ['bulan' => bulan($bulan), 'tahun' => $tahun];
            $data[$i]['potongan'] = $gaji['status'] ? Potongan::where('gaji_id', $gaji->id)->get() : 0; 
            $i++;
        }
        return $data;
    }

    public function getOne($user_id,$periode){
        $periode = explode('-', $periode);
        $tahun = $periode[0];
        $bulan = $periode[1];
        $data['periode'] = [
            'tahun' => $tahun,
            'bulan' => bulan($bulan)
        ];

        $data['user'] = User::with('jabatan')->where('id', $user_id)->first();
        $data['gaji'] = Gaji::where('user_id', $data['user']->id)
                            ->whereYear('periode', '=', $tahun)
                            ->whereMonth('periode', '=', $bulan)
                            ->first();
        if($data['gaji']){
            $data['potongan'] = Potongan::where('gaji_id', $data['gaji']->id)->get();
        }

        return $data;
    }

    public function getById($id){
        $gaji = Gaji::with('user', 'potongans')->where('id', $id)->first();
        if(!$gaji['potongans']){
            $gaji['potongans'] = false;
        }

        return $gaji;
    }

    public function addGaji(Array $data){
        $gaji = [
            'user_id' => $data['user_id'],
            'gaji_pokok' => $data['gaji_pokok'],
            'uang_transport' => $data['uang_transport'],
            'uang_makan' => $data['uang_makan'],
            'bonus' => $data['bonus'],
            'lembur' => $data['lembur'],
            'total_gaji' => $data['total_gaji'],
            'diterima' => $data['diterima'],
            'periode' => date('Y-m-d', strtotime($data['periode']))
        ];
        $saveGaji = Gaji::create($gaji);
        $potongan = $this->addPotongan($saveGaji->id,$data);
        return [ 'gaji' => $saveGaji,'potongan' => $potongan];

    }

    public function addPotongan(Int $gaji_id,Array $data){
        $jenis_potongan = $data['jenis_potongan'];
        $jumlah_potongan = $data['jumlah'];
        $potongans = [];
        if($jenis_potongan[0]){
            for($i=0; $i < count($jenis_potongan); $i++){
                if($jenis_potongan[$i]){
                    Potongan::create([
                        'gaji_id' => $gaji_id,
                        'jenis_potongan' => $jenis_potongan[$i],
                        'jumlah' => $jumlah_potongan[$i]
                    ]);
                }
            }
        }else{
            $potongans = false;
        }
        
        return $potongans;
    }

    public function delete($gaji_id){
        return Gaji::where('id', $gaji_id)->delete();
    }
    
}