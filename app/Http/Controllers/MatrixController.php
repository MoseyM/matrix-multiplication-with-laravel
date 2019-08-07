<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\FullMatrix;

class MatrixController extends Controller
{
    /**
     * Creates a new matrix product from user input.
     * 
     * @param  Request $request
     * @return string
     */
    public function getMatrixProduct(Request $request)
    {
        //validate the input
        $this->validate($request, [
            'firstMatrix'  => ['required', 'array', new FullMatrix],
            'secondMatrix' => [
                'required', 
                'array',
                new FullMatrix,
                "size:{$this->getMatrixCount($request, 'firstMatrix')}"]
        ]);
            
        //multiply the matrix
        
        //return the alpha parsed representation
        
        return response()->json(['result' => true]);
    }

    /**
     * Get the count for the requested Matrix.
     * 
     * @param Request $request
     * @param string  $name     The field to use.
     * 
     * @return int
     */
    protected function getMatrixCount(Request $request, $name)
    {
        return count($request->$name[0]);
    }
}
