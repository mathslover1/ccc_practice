<pre>
    <?php
    // class A
    // {
    //     public $i = 0;
    //     public function inc()
    //     {
    //         $this->i++;
    //     }
    //     public function reset()
    //     {
    //         $this->i = 10;
    //     }
    // }

    // $obj1 = new A();
    // print_r($obj1);
    // $obj1->inc();
    // print_r($obj1);
    // $obj1->reset();
    // $obj1->i = 10;

    // $obj2 = new A();
    // $obj2->inc();

    // print_r($obj1);
    // $obj1->inc();
    // print_r($obj2);
    ?>

    <?php
// class MyClass {
//     public function __construct() {
//         echo "Constructor called\n";
//     }
// }
// $obj = new MyClass(); // Output: Constructor called

// class MyClass {
//     public function __destruct() {
//         echo "Destructor called\n";
//     }
// }

// $obj = new MyClass();
// unset($obj); // Output: Destructor called

// class MyClass {
//     public function __call($name, $arguments) {
//         echo "Calling undefined method: $name\n";
//     }
// }
// $obj = new MyClass();
// $obj->undefinedMethod(); // Output: Calling undefined method: undefinedMethod

// class MyClass {
//     public static function __callStatic($name, $arguments) {
//         echo "Calling undefined static method: $name\n";
//     }
// }
// MyClass::undefinedStaticMethod(); // Output: Calling undefined static method: undefinedStaticMethod

// class MyClass {
//     private $data = ['name' => 'John'];
//     public $abc = "vivek";

//     public function __get($name) {
//         print_r($this);
//         return $this->data[$name] ?? "null";
//     }
// }
// $obj = new MyClass();
// $obj1 = new MyClass();
// echo $obj->name;
// echo $obj1->xyz;

 // Output: John

//  class MyClass {
//     private $data = [];

//     public function __set($name, $value) {
//         $this->data[$name] = $value;
//     }
//     public function __get($name) {
//        return  $this->data[$name];
//     }
// }

// $obj = new MyClass();
// $obj->age = 30;
// echo $obj->age; // Output: 30

// class MyClass {
//     private $name = 'John';

//     public function __isset($name) {
//         return isset($this->$name);
//     }
// }

// $obj = new MyClass();
// var_dump(isset($obj->name)); // Output: bool(true)

// class MyClass {
//     private $name = 'John';

//     public function __unset($name) {
//         unset($this->$name);
//     }
// }

// $obj = new MyClass();
// print_r($obj);
// unset($obj->name);
// print_r($obj);

// class MyClass {
//     public function __toString() {
//         return "This is a MyClass object\n";
//     }
// }
// $obj = new MyClass();
// echo $obj; // Output: This is a MyClass object


// class MyClass {
//     public function __invoke($x) {
//         return $x * $x;
//     }
// }
// $obj = new MyClass();
// echo $obj(5); // Output: 25

// class MyClass {
//     public function __serialize() {
//         return ['custom' => 'data'];
//     }
// }

// $obj = new MyClass();
// $serialized = serialize(['key'=> 'data']);
// print_r($serialized);
// var_dump($serialized);
// $unserialized = unserialize($serialized);
// print_r($unserialized);



