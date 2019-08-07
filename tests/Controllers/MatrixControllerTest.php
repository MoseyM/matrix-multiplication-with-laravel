<?php
namespace Tests\Controllers;

use Tests\TestCase;

class MatrixControllerTest extends TestCase {

	/**
	 * Tests the post call to retrieve 
	 * a matrix product from inputed matrices.
	 *
	 * @return void
	 */
    public function testGetMatrixProduct() 
	{
		$matrixA = [1,2];
		$matrixB = [
			[1],
			[4]
		];
		$this->json('POST','/matrix', [
				'firstMatrix' => $matrixA, 
				'secondMatrix' => $matrixB 
		   ])->seeJson([
			   'result' => ['I']
		   ]);		
	}
}

?>
