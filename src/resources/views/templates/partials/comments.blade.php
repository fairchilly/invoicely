@if(!empty(trim($comments)))
  <div class="size-4 panel panel-default">
    <div class="panel-body block">
      <p>
        <b>COMMENTS</b>
      </p>
      <p>
        {{ $comments }}
      </p>
    </div>
  </div>
@endif