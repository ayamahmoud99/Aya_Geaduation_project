<?php


namespace App\Http\Interfaces;


interface RepositoryInterface
{

    public function all(); //it is same index

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);



}
