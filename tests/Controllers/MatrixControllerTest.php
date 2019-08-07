<?php
namespace Tests\Controllers;

use Tests\TestCase;

class MatrixControllerTest extends TestCase {

	/**
	 * Created data for different scenarios.
	 * 
	 * @return array
	 */
	public function matrixDataProvider()
	{
		return [
			'correct input'      => [
				[
					[1,2]
				],
				[
					[1],
					[2]
				],
				200,
				['E']
			],
			'unequal matrixA'    => [
				[
					[2,4],
					[3,5,6]
				],
				[
					[5,6,7],
					[4,3,6]
				],
				422,
				["firstMatrix" => ["The first matrix must not contain null or empty values."]]
			],
			'unequal matrixB'    => [
				[
					[3,6,5],
					[6,8,7]
				],
				[
					[1],
					[4,6,7],
					[5,7,8]
				],
				422,
				["secondMatrix" => ["The second matrix must not contain null or empty values."]]
			],
			'unequal row to col' => [
				[
					[2,4,5,6]
				],
				[
					[2],
					[5],
					[7]
				],
				422,
				['secondMatrix' => ["The second matrix must contain 4 items."]]
			],
		];
	}


	/**
	 * Tests the post call to retrieve 
	 * a matrix product from input.
	 *
	 * @dataProvider matrixDataProvider
	 * 
	 * @return void
	 */
    public function testGetMatrixProduct($matrixA, $matrixB, $status, $expected) 
	{
		$response = $this->call('POST','/matrix', [
				'firstMatrix' => $matrixA, 
				'secondMatrix' => $matrixB 
		   ]);

		   $this->assertEquals($status, $response->status());
		   $this->seeJsonEquals($expected);
	}
}

?>
