<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inquiry $inquiry
 */

// Check if the user has confirmed the inquiry and wants to proceed
//if (!$inquiry->inquiry_confirmed) {
    // Redirect to the confirm action with the inquiry ID
    //header('Location: ' . $this->Url->build(['action' => 'confirm', $inquiry->id]));
    //exit; // Ensure that no further code is executed after the redirection
///}

// Display content related to confirming the inquiry
// You can customize this section as needed
?>
<h1>Confirm Inquiry</h1>
<p>Are you sure you want to confirm this inquiry?</p>
<form method="post" action="<?= $this->Url->build(['action' => 'confirm', $inquiry->id]) ?>">
    <button type="submit" class="formbutton">Confirm</button>
</form>


