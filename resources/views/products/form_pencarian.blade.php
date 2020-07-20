<div class="box-body">
{!! Form::open(['url' => 'products/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
     <div class="row">
            <div class="input-group">
            {!! Form:: text('kata_kunci', (! empty($kata_kunci)) ? $kata_kunci : null,['class' => 'form-control', 'placeholder' => 'Masukkan Kata Kunci']) !!}
            <span class="input-group-btn">
            {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
            </span>
            </div>
    </div>
{!! Form::close() !!}
</div>