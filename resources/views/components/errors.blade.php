
 @if($errors->any())
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                <ul>
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            </div>
        </div>
    </div>
@endif