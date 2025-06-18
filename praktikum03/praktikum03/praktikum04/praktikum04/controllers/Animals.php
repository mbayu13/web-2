<?php
class Animal {
    public $animals = ["Kucing", "Harimau", "Kelinci", "Buaya", "Ular"];

    function index() {
        echo "<ol>";
        foreach ($this->animals as $key => $value) {
            echo "<li>$value</li>";
        }
        echo "</ol>";
    }
    function store($hewan){
        array_push($this->animals, $hewan);

        $this->index();
    }
    public function update($key, $value){
        if(isset($this->animals[$key])){
        
        $this->animals[$key] = $value;

        //memanggil method index
        $this->index();
        } else{
            echo "hewan tidak ditemukan";
        }
    }
    public function destory($key){
        if(isset($this->animals[$key])){
        
            unset($this->animals[$key]);
    
            //memanggil method index
            $this->index();
        } else{
            echo "hewan tidak ditemukan";
        }
    }
}

$hewan = new Animal();
echo "Index - menampilkan seluruh data Hewan <br>";
$hewan->index();
echo "<br>";

echo"store - menambahkan data hewan baru(Burung) <br>";
$hewan->store("burung");
echo "<br>";

echo"Update - Mengubah data hewan<br>";
$hewan->update(6,"kucing anggora");
echo "<br>";

echo"Destroy - Mengubah data hewan <br>";
$hewan->destroy(0);
echo "<br>";
?>