<?php
class messages {
    public function success($msg)
    {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $msg . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
     public function error($msg)
    {
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $msg . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    
     public function warning($msg)
    {
        return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> ' . $msg . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}
// $funObj1 = new messages();
// echo $funObj1->error('Registration Not Successful!!!');

?>