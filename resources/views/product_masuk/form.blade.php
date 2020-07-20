@if (isset($productmasuk))
    {!! Form::hidden('id', $productmasuk->id) !!}
@endif
<!-- nama -->

<!-- product -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('product_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('product_id', 'Product:', ['class' => 'control-label']) !!}
    @if(count($list_product) > 0)
        {!! Form::select('product_id', $list_product, null, ['class' => 'form-control', 'id' => 'product_id', 'placeholder' => 'Pilih Produk']) !!}
     @else
       <p>Tidak ada pilihan product buat dulu ya...!</p>
   @endif
   @if ($errors->has('product_id'))
       <span class="help-block">{{ $errors->first('product_id') }}</span>
   @endif
</div>
<!-- end -->
<!-- supp -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('supplier_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('supplier_id', 'Supplier:', ['class' => 'control-label']) !!}
    @if(count($list_supplier) > 0)
        {!! Form::select('supplier_id', $list_supplier, null, ['class' => 'form-control', 'id' => 'supplier_id', 'placeholder' => 'Pilih Supplier']) !!}
     @else
       <p>Tidak ada pilihan supplier buat dulu ya...!</p>
   @endif
   @if ($errors->has('supplier_id'))
       <span class="help-block">{{ $errors->first('supplier_id') }}</span>
   @endif
</div>
<!-- end -->
<!-- TANGGAL  -->
@if ($errors->any())
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('tanggal', 'Tanggal :', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal', !empty($productmasuk) ? $productmasuk->tanggal->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal']) !!}
    @if ($errors->has('tanggal'))
        <span class="help-block">{{ $errors->first('tanggal') }}</span>
    @endif
</div>
<!-- end -->



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
<!-- SUBMIT -->

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
<!-- CANCEL -->
<div class="form-group">
    {{link_to('productsIn/', 'Cancel', ['class' => 'btn btn-warning form-control'])}}
</div>