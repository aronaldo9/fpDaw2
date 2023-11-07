<?php

if(!empty($_POST['cancion'])){
 CancionRepository::addCancion($_POST,$_FILES);
}
