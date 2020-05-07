<?php

namespace App\Repositories;

interface Repository
{
	function get();
	
	function paginate($n);

	function where(array $attributes );

    function find($id);

	function group(array $attributes);

	function sum(array $attributes);

	function create(array $attributes);

	function update($id, array $attributes);

	function delete($id);
}
