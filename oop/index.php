<?php 
include_once('./models/student.php');

$students = student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);
 
    setcookie('message',$response,time()+10);
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);
    setcookie('message',$response,time()+10);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    

</head>
<body>
    <div class="">
        <!-- header -->
        <div class="bg-red-600 p-3 text-center text-white">DATA SISWA</div>

        <!--alert-->
        <?php include('../layouts/alert.php');?>
        <!-- main -->
        <div class="flex">
            <!-- sidebar -->
            <div class="basis-1/4 p-2 bg-gray-400 ">
                <div class="bg-red-200 m-3 p-3 rounded-lg">
                <form action="" method="POST" > FORM INPUT DATA
                    <!-- nama -->
                    <div class="mb-3 m-2">
                        <label for="name">Nama</label>
                        <input   class="rounded-lg text-center block w-full " type="text" name="name" id="name" placeholder="ketik disini" >
                    </div>
                    <!-- nis -->
                    <div class="mb-3 m-2">
                        <label for="nis" >Nis</label>
                        <input  class="rounded-lg text-center block w-full" type="number" name="nis" id="nis" placeholder="ketik disini">
                    </div>
                    <!-- button -->
                    <div class="grid gap-2">
                        <button type="submit" name="submit" class="bg-red-200 rounded-lg hover:bg-red-300 p-1 text-white">Submit</button>
                    </div>
                    
                </form>
            </div>
            </div>
            <!-- content -->
            <div class="basis-3/4 p-2 bg-white">
                <div class="bg-red-200 p-3 m-3 rounded-lg">DATA SISWA
                    <div class="">
                        <table class="w-full">
                            <thead class="text-center border border-red-200 bg-red-300 text-white">
                                <tr>
                                    <th class="px-6 py-3">No.</th>
                                    <th class="px-6 py-3">Nama</th>
                                    <th class="px-6 py-3">Nis</th>
                                    <th class="px-6 py-3">Confirm</th>
                                </tr>
                            </thead>

                            <tbody class="text-center border border-red-300 ">
                                <?php foreach($students as $key => $student) : ?>
                                <tr class="border border-red-200">
                                    <td class="px-6 py-3"><?= $key + 1 ?></td>
                                    <td class="px-6 py-3"><?= $student['name'] ?></td>
                                    <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                    <td>
                                        <!-- detail -->
                                   <a href="detail.php?id=<?=$student['id'] ?>" class="text-white hover:bg-red-600 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-red-400">Detail</a>
                                        <!-- edit -->
                                   <a href="edit.php?id=<?=$student['id'] ?>" class="text-white hover:bg-red-400 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-red-600">Edit</a>
                                   <!-- hapus -->
                                        <form action="" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                            <button class="bg-red-600 hover:bg-red-400 pt-2 pb-2 pl-3 pr-3 rounded-xl  text-white" name="delete" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
            <div class="bg-red-600 p-3 text-center text-white">
                 &copy; atifah fadhila
             </div> 
    </div>
</body>
</html>