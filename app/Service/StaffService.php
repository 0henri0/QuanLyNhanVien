<?php

namespace App\Service;

use App\Service\Interfaces\StaffInterface;
use App\Service\BaseService;
use App\Models\Staff;

 class StaffService extends BaseService implements StaffInterface
{
     /**
      * Get All
      * @return \Illuminate\Database\Eloquent\Collection|static[]
      */
     public function getAll()
     {
         return Staff::with('leader','staff')->get();
     }

     /**
      * Get one
      * @param $id
      * @return mixed
      */
     public function find($id)
     {
         $result = Staff::with('leader','staff')->find($id);

         return $result;
     }

     /**
      * Create
      * @param array $attributes
      * @return mixed
      */
     public function create(array $attributes)
     {

         return Staff::create($attributes);
     }

     /**
      * Update
      * @param $id
      * @param array $attributes
      * @return bool|mixed
      */
     public function update($id, array $attributes)
     {
         $result = $this->find($id);
         if ($result) {
             $result->update($attributes);
             return $result;
         }

         return false;
     }

     /**
      * Delete
      *
      * @param $id
      * @return bool
      */
     public function delete($id)
     {
         $result = $this->find($id);
         if ($result) {
             $result->delete();

             return true;
         }

         return false;
     }

 }
