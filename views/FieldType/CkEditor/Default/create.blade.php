<div class="__xe_content __xe_section">
    <div class="write_form_editor">
    {!! editor($config->get('group') . '_' . $config->get('id'), [
      'content' => Input::old($config->get('id') . 'Contents'),
      'contentDomId' => 'df-' . $config->get('id') . 'Contents',
      'contentDomName' => $config->get('id') . 'Contents'
    ]) !!}
    </div>
</div>