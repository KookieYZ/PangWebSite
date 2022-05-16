@props(['person'])

<div class="form-group row">
    @php
    $exploded_spouse = explode('|', $person->spouse_name);
    @endphp
    @foreach($exploded_spouse as $key => $value)
    <label for="spouse_name" class="col-sm-3 text-end control-label col-form-label">配偶名称{{$key+1}}</label>
    <div class="col-sm-9">
        <input type="text" class="form-control{{ $errors->has('spouse_name') ? ' is-invalid' : '' }}" id="spouse_name"
            name="spouse_name[]" placeholder="未有配偶"
            value="{{ old('spouse_name') ? old('spouse_name') : $value }}" /><br />
        @if ($errors->has('spouse_name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('spouse_name') }}</strong>
        </span>
        @endif
    </div>
    @endforeach
</div>

<div class="form-group row">
    @php
    $exploded_spouse_ava = explode('|', $person->spouse_avatar);
    $numofRecord = count($exploded_spouse_ava);
    @endphp
    @foreach($exploded_spouse_ava as $key => $value)
    <label class="col-sm-3 text-end control-label col-form-label">配偶头像 {{$key+1}}</label>
    <div class="col-md-9">
        <input type="hidden" id='numofRecord' value="{{$numofRecord}}" style="display:none">
        <div class="custom-file">
            <input type="file" class="custom-file-input{{ $errors->has('spouse_avatar') ? ' is-invalid' : '' }}"
                id="spouse_avatar{{$key+1}}" name="spouse_avatar[]" onchange="previewImage(event,{{$key+1}});"
                accept="image/*" />
            <br /><br />
            <img src=" {{ asset('image/avatar/' . $value) }}" id="display{{$key+1}}" height="130" width="130"
                style="border:solid;">
        </div>
        <br />
        @if ($errors->has('spouse_avatar'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('spouse_avatar') }}</strong>
        </span>
        @endif
    </div>
    @endforeach
    <input type='hidden' id="numofSpouse" name="numofSpouse" value={{$numofRecord}}>
</div>

<input type='hidden' id="storeSpouseImgSrc" name="storeSpouseImgSrc">
<div id="addMoreSpouseName" class="form-group row">
</div>
<div id="addMoreSpouseAvatar" class="form-group row">