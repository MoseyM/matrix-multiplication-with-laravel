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
			'unequal matrixA' => [
				[
					[2,4],
					[3,5,6]
				],
				[
					[5,6,7],
					[4,3,6]
				],
				422,
				[
					'result' => 'fail',
					'errors' => [
						"firstMatrix" => ["The first matrix must not contain null or empty values."]]
				]
			],
			'unequal matrixB' => [
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
				[
					'result' => 'fail',
					'errors' => ["secondMatrix" => ["The second matrix must not contain null or empty values."]]
				]
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
				[
					'result' => 'fail',
					'errors' => ['secondMatrix' => ["The second matrix must contain 4 items."]]
				]
			],
			'nonnumeric values MatrixA' => [
				[
					[2,5,6,'K']
				],
				[
					[5],
					[6],
					[8],
					[9]
				],
				422,
				[
					'result' => 'fail',
					'errors' => ['firstMatrix' => ["The matrix must only contain numbers."]]
				]
			],
			'out of range numeric values' => [
				[
					[400,30,6]
				],
				[
					[70],
					[7],
					[6]
				],
				422,
				[
					'result' => 'fail',
					'errors' => [
						'firstMatrix' => ["The first matrix must only contain numbers between 1 and 26"],
						'secondMatrix' => ["The second matrix must only contain numbers between 1 and 26"]
					]
				]
			]
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
