@csrf
<div>
    <farm-form
        :old='@json(old())'
        :errors="{{$errors}}"
        :states='@json($states)'>
    </farm-form>
</div>
