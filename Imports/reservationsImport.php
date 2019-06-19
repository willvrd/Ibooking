<?php

namespace Modules\Ibooking\Imports;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use DB;
use Exception;

class ReservationsImport implements ToCollection,WithChunkReading,WithHeadingRow,ShouldQueue
{


    public function collection(Collection $rows)
    {
        
        $rows=json_decode(json_encode($rows));
        foreach ($rows as $row)
        {
            //dd($row['id']);
            dd($row->id);
            if(isset($row->id)){
                try {
                    $data=[];
                    $data['id']=$row->id;

                    if(isset($row->first_name)){
                        $firstName=$row->first_name;
                        $data['first_name']=$firstName;
                    }

                } catch (\Exception $e) {
                    \Log::error('Error import reservation: '.$e->getMessage());
                }//catch
            }else{
                dd("noo");
            }
        }

       
        
        exit();
    }

     /*
    The most ideal situation (regarding time and memory consumption)
    you will find when combining batch inserts and chunk reading.
    */
    public function batchSize(): int
    {
        return 1000;
    }

    /*
     This will read the spreadsheet in chunks and keep the memory usage under control.
    */
    public function chunkSize(): int
    {
        return 1000;
    }

}