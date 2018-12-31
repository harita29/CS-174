<?php

class landingview 
{

    public function render($data1,$data2,$data3,$id)
    {
        require BASE_URL."/views/layouts/header.php";
        echo '<h1>'.$data2.'</h1>
            <table>
                <tr>
                    <td>
                        <ul>
                            <h2>List</h2>
                            <li><a href="index.php?name_of_controller=home&name_of_method=create&id='.$id.'&sub='.$id.'">[New List]</a></li>
                           '.$data1.'</ul>
                    </td>
                    <td>
                         <ul>
                             <h2>Notes</h2>
                            <li><a href="index.php?name_of_controller=note&name_of_method=create&id='.$id.'">[New Note]</a></li>
                            '.$data3.'
                        </ul>
                    </td>
                </tr>
            </table>';
        require BASE_URL."/views/layouts/footer.php";
    }
    
    
}

