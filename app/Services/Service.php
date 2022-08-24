<?php

namespace App\Services;
use Exception;

class Service{

    public $model;

    public function get(){
        try{
            return $this->model->get();
        }catch(Exception $e){
            return " error geting service" . $e;
        }
    }

    public function create($attributes = []){
        try{
            return $this->model->create($attributes);
        }catch(Exception $e){
            return " error creating service" . $e;
        }
    }
    public function findbyID($id){
        try{
            return $this->model->find($id);
        }catch(Exception $e) {
            return "error finding service" . $e;
        }
    }

    public function update($id, $attributes = []){
        try{
            return $this->model->where('id','=',$id)->update($attributes);
        }catch(Exception $e) {
            return "error updating service" . $e;
        }
    }

    public function delete($id){
        try{
            return $this->model->delete($id);
        }catch(Exception $e) {
            return "error delete service" . $e;
        }
    }
}
