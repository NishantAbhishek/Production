<?php

namespace App\Controller;

use App\Controller\AppController;

class AdminController extends AppController
{
    public function adminHome()
    {
        // Check if current user is an admin.
        $user = $this->request->getAttribute('identity');
        $userRole = $user->user_level;
        if ($userRole != 'admin') {

            $this->Flash->error('Access denied. You must be an admin to access this page.');
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

    }

}
?>
