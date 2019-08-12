# Project: Matrix Multiplication Parse to Alpha

This is a Lumen application that takes some input from a GET endpoint and parses it into a matrixwhere the numeric values are its alpha representation (ie 1 => A, 28 => AC). 

## Testing and Validation

Validation will check that the matrices follow the principle of A matrix columns equaling B matrix rows. If this validation fails an error is returned

Testing will ensure the code is written to accomodate scenarios such as a matrix of unequal columns or rows. As well as input with alphanumeric characters as all input values should be numeric.

## Setup

Clone this repository
Run `composer update`

## API Documentation
This application at the time of this writing has one open endpoint '/matrix'. To view the parameter requirements and expected return values, check out matrix.raml(within the /docs directory).


