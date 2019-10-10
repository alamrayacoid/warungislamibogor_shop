<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class saldoController extends Controller
{
    public function tarik_dana()
    {
        DB::beginTransaction();
        try {

            $get_saldo = DB::table('d_walletmember')
                ->where('wm_customer',Auth::user()->cm_code)
                ->get();

            foreach ($get_saldo as $row){
                $total = (float)$row->wm_total - (float)str_replace(',','',$request->uang);

                if ($total < 0){
                    return response()->json([
                        'error' => 'Saldo Anda Kurang',
                    ]);
                }

                DB::table('d_walletmember')
                    ->where('wm_customer',Auth::suer()->cm_code)
                    ->update([
                       'wm_total' => $total,
                       'wm_first' => (float)str_replace(',','',$request->uang),
                        'wm_last' => $row->wm_total,
                    ]);
            }


            DB::commit();
            return response()->json([
                'status' => 'sukses'
            ]);

        } catch (Exception $e) {
            throw $e;
            return response()->json([
                'status' => 'gagal'
            ]);
        }
    }
}
