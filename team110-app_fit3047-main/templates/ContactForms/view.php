<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="contactForms view content">
            <h3>Customer Messages.</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($contactForm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Name') ?></th>
                    <td><?= h($contactForm->contact_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Email') ?></th>
                    <td><?= h($contactForm->contact_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Phone') ?></th>
                    <td><?= h($contactForm->contact_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Replied') ?></th>
                    <td><?= $contactForm->contact_replied ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Contact Msg') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($contactForm->contact_msg)); ?>
                </blockquote>
            </div>
        </div>
    </div>
    <aside class="column">
        <div class="center-nav">
            <?= $this->Html->link(__('Set as Replied.'), ['action' => 'edit', $contactForm->id], ['class' => 'formbutton']) ?>
            <?= $this->Form->postLink(__('Delete Contact Form'), ['action' => 'delete', $contactForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactForm->id), 'class' => 'formbutton']) ?>
            <?= $this->Html->link(__('List Contact Forms'), ['action' => 'index'], ['class' => 'formbutton']) ?>
        </div>
    </aside>
</div>
