<?php
class TicketRepository {
    public static function getClientTickets($user_id) {

    }

    public static function getWorkerTickets($user_id) {
        
    }

    public static function getAnswersByTicketId() {
        
    }

    public static function createTicket($ti,$te) {
         
        // Conectar a la base de datos (asegúrate de tener la función Conectar::conexion() definida)
        $bd = Conectar::conexion();    
        // Crear la consulta SQL para insertar el nuevo ticket
        $q = "INSERT INTO ticket VALUES (null, '" . $ti . "', '" . $te . "', 0, " . $_SESSION['user_id']->getId . ",0)";
    
        // Ejecutar la consulta
        $result = $bd->query($q);    
        // Verificar el resultado y manejar cualquier error
        if ($result) {
            // Éxito: el ticket se creó correctamente
            echo "Ticket creado exitosamente.";
        } else {
            // Error: manejar la falla de la consulta
            echo "Error al crear el ticket: " . $bd->error;
        }    
        // Cerrar la conexión a la base de datos
        $bd->close();
    }

    public static function getTicketById($id) {
        $bd=Conectar::conexion();
        $q="SELECT * FROM ticket WHERE id='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new Ticket($datos);
        }
    }

    public static function getTickets() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM ticket";
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }

    public static function getTicketsByUserId($uid) {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM ticket WHERE user_id=".$uid;
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }

    public static function getTicketsByWorkerId($wid) {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM ticket WHERE worker_id=".$wid;
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }

    public static function getTicketsUnassigned() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM ticket WHERE worker_id=0;
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }
    
}

?>