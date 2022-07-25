<?php

    function calculate_result(int $n1, int $n2, string $op): int{

        // Initialize object as asked in documentation
        $calculateObject = new Calculate($n1,$n2,$op);

        // We ensure that we respect the private scope of object and the service appears clearer
        return $calculateObject->result($calculateObject->getN1(), $calculateObject->getN2(), $calculateObject->getOp());

    }


    class Calculate {

        private int $n1;
        private int $n2;
        private string $op;

        public function __construct(int $n1, int $n2, string $op) {
            $this->n1 = $n1;
            $this->n2 = $n2;
            $this->op = $op;
        }

        /**
         * @function - Take two int and one operator to compute everything
         * @param int $n1 - The first parameter should be an integer
         * @param int $n2 - The second parameter should be an integer
         * @param string $op - The operator defines which computation we want ('+','-','/','*')
         * @return int - Return the result if we can compute or -1 if divided by zero
         */
        public function result(int $n1, int $n2, string $op): int {

            // We use a switch for flexibility (because maybe we would support another sign later
            switch($op) {
                case '*':
                    $result = $n1 * $n2;
                    break;

                case '/':
                    // If divided by zero we set value to -1 else we compute the division
                    $n2 === 0 ? $result = -1 : $result = round($n1 / $n2 );
                    break;

                case '+':
                    $result = $n1 + $n2 ;
                    break;

                case '-':
                    $result = $n1 - $n2;
                    break;

                default:
                    $result = 0;
                    break;
            }
            return $result;
        }


        /* Getters & setters part */
        public function getN1(): int {
            return $this->n1;
        }

        public function setN1(int $n1): self {
            $this->n1 = $n1;

            return $this;
        }

        public function getN2(): int {
            return $this->n2;
        }

        public function setN2(int $n2): self {
            $this->n2 = $n2;

            return $this;
        }

        public function getOp(): string {
            return $this->op;
        }

        public function setOp(string $op): self {
            $this->op = $op;

            return $this;
        }
    }

    /** Calling part */
    $result1 = calculate_result(1,8,'+');
    $result2 = calculate_result(5,5,'-');
    $result3 = calculate_result(10,0,'/');
    $result4 = calculate_result(10,2,'/');
    $result5 = calculate_result(3,3,'*');
    $result6 = calculate_result(10,3,'/');

    /** Controls part **/

    echo "calculate_result(1,8,'+');" . PHP_EOL;
    echo $result1 . PHP_EOL;

    echo "calculate_result(5,5,'-');" . PHP_EOL;
    echo $result2 . PHP_EOL;

    echo "calculate_result(10,0,'/')" . PHP_EOL;
    echo $result3 . PHP_EOL;

    echo "calculate_result(10,2,'/');" . PHP_EOL;
    echo $result4 . PHP_EOL;

    echo "calculate_result(3,3,'*');" . PHP_EOL;
    echo $result5 . PHP_EOL;

    echo "calculate_result(10,3,'/');" . PHP_EOL;
    echo $result6 . PHP_EOL;
