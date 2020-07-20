@if (isset($product))
    {!! Form::hidden('id', $product->id) !!}
@endif
<!-- nama -->
@if ($errors->any())
<div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('nama', 'Name:', ['class' => 'control-label']) !!}
     {!! Form::text('nama', null, ['class' => 'form-control']) !!}
     @if ($errors->has('nik'))
        <span class="help-block">{{ $errors->first('nama') }}</span>
     @endif
</div>
<!-- END -->
<!-- category -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('category_id', 'Category:', ['class' => 'control-label']) !!}
    @if(count($list_category) > 0)
        {!! Form::select('category_id', $list_category, null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Pilih Kategori']) !!}
     @else
       <p>Tidak ada pilihan posisi, buat dulu ya...!</p>
   @endif
   @if ($errors->has('category_id'))
       <span class="help-block">{{ $errors->first('category_id') }}</span>
   @endif
</div>
<!-- end -->
<!-- harga -->
@if ($errors->any())
<div class="form-group {{ $errors->has('harga') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('harga', 'Harga:', ['class' => 'control-label']) !!}
     {!! Form::text('harga', null, ['class' => 'form-control']) !!}
     @if ($errors->has('harga'))
        <span class="help-block">{{ $errors->first('harga') }}</span>
     @endif
</div>
<!-- end -->
<!-- qty -->
@if ($errors->any())
<div class="form-group {{ $errors->has('qty') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('qty', 'Jumlah:', ['class' => 'control-label']) !!}
     {!! Form::text('qty', null, ['class' => 'form-control']) !!}
     @if ($errors->has('qty'))
        <span class="help-block">{{ $errors->first('qty') }}</span>
     @endif
</div>
<!-- end -->

<!-- FOTO -->
@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
    @if ($errors->has('foto'))
        <span class="help-block">{{ $errors->first('foto') }}</span>
    @endif
    <!-- MENAMPILKAN FOTO -->
    @if (isset($product))
        @if (isset($product->foto))
            <img src="{{ asset('fotoupload/' . $product->foto) }}">
        @else
                <img src="{{ asset('fotoupload/dummyfemale.png') }}">
        @endif
    @endif
</div>
<!-- SUBMIT -->

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
<!-- CANCEL -->
<div class="form-group">
    {{link_to('products/', 'Cancel', ['class' => 'btn btn-warning form-control'])}}
</div>