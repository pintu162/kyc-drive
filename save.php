<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form se data lena
    $EmpID = $_POST['EmpID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];

    // Excel file ka naam
    $file = 'employee_data.csv';

    // Agar file exist nahi karti to header likho
    if (!file_exists($file)) {
        $header = ["EmpID","Name", "Email", "Phone", "Department"];
        $handle = fopen($file, 'w');
        fputcsv($handle, $header);
    } else {
        $handle = fopen($file, 'a'); // Append mode
    }

    // Data ko CSV format me likho
    $data = [$EmpID, $name, $email, $phone, $department];
    fputcsv($handle, $data);
    fclose($handle);

    echo "Data successfully saved!";
} else {
    echo "Invalid Request!";
}
?>
