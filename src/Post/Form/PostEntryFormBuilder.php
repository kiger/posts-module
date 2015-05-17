<?php namespace Anomaly\PostsModule\Post\Form;

use Anomaly\PostsModule\Entry\Form\EntryFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class PostEntryFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Form
 */
class PostEntryFormBuilder extends MultipleFormBuilder
{

    /**
     * Fired after the entry form is saved.
     *
     * After the entry form is saved take the
     * entry and use it to populate the post
     * before it saves directly after.
     *
     * @param EntryFormBuilder $builder
     */
    public function onSavedEntry(EntryFormBuilder $builder)
    {
        /* @var FormBuilder $form */
        $form = $this->forms->get('post');

        $post = $form->getFormEntry();

        $entry = $builder->getFormEntry();

        $post->entry_id   = $entry->getId();
        $post->entry_type = get_class($entry);
    }
}
