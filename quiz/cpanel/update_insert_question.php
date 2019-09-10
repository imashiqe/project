<?php
require '../php/function.php';
$conn = pending_tb();

// if insert button is clicked
if(isset($_POST['insert_btn'])){
   
    $question = validate($_POST['question']);
    $opa = validate($_POST['opa']);
    $opb = validate($_POST['opb']);
    $opc = validate($_POST['opc']);
    $opd = validate($_POST['opd']);
    $position = validate($_POST['position']);

    

    if(empty($question) || empty($opa) || empty($opb) || empty($opc) || empty($opd) || empty ($position)){
        header('location:question.panel.php?error=qempty');
        exit();
    }else{


        if(is_numeric($position)){

        
            $sql = "SELECT * FROM question WHERE no = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('location:question.panel.php?error=qsql');
                exit();
            }
            else{
    
                mysqli_stmt_bind_param($stmt, 's', $position);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
    
                if($result > 0){
    
                    header('location:question.panel.php?error=qexists');
                    exit();
    
                }else{
    
                    $sql_insert = "INSERT INTO question (no, que , opa , opb , opc , opd) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt_insert = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt_insert, $sql_insert)){
                        header('location:question.panel.php?error=qsql');
                        exit();
    
                    }else{
    
                        mysqli_stmt_bind_param($stmt_insert, 'isssss', $position, $question, $opa, $opb, $opc, $opd);
                        if(mysqli_stmt_execute($stmt_insert)){
                            header('location:question.panel.php?error=qsuccess');
                            exit();
                        }else{
                            header('location:question.panel.php?error=qsql');
                            exit();
                        }
    
                    }
    
    
    
                }
    
            }
            

        }else{
            header('location:question.panel.php?error=nan');
            exit();
        }
        }
        
    


}

// else if update button is clicked

else if(isset($_POST['update_btn'])){

    $question = validate($_POST['question']);
    $opa = validate($_POST['opa']);
    $opb = validate($_POST['opb']);
    $opc = validate($_POST['opc']);
    $opd = validate($_POST['opd']);
    $position = validate($_POST['position']);

    if(empty($question) || empty($opa) || empty($opb) || empty($opc) || empty($opd) || empty ($position)){
        header('location:question.panel.php?error=qempty');
        exit();
    }else{
        
        if(is_numeric($position)){

        
            $sql = "SELECT * FROM question WHERE no = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('location:question.panel.php?error=qsql');
                exit();
            }
            else{
    
                mysqli_stmt_bind_param($stmt, 's', $position);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
    
                if($result < 1){
    
                    header('location:question.panel.php?error=qno');
                    exit();
    
                }else{
    
                    $sql_insert = "UPDATE question SET que = ?, opa = ?, opb = ?, opc = ?, opd = ? WHERE no = ?";
                    $stmt_insert = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt_insert, $sql_insert)){
                        header('location:question.panel.php?error=qsql');
                        exit();
    
                    }else{
    
                        mysqli_stmt_bind_param($stmt_insert, 'sssssi', $question, $opa, $opb, $opc, $opd, $position);
                        if(mysqli_stmt_execute($stmt_insert)){
                            header('location:question.panel.php?error=usuccess');
                            exit();
                        }else{
                            header('location:question.panel.php?error=qsql');
                            exit();
                        }
    
                    }
    
    
    
                }
    
            }
            

        }else{
            header('location:question.panel.php?error=unan');
            exit();
        }

        

    }
    


}
// if nothing clicked
else{
  header('location:question.panel.php');
  exit();
}