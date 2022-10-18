<div class="col-lg-12">

    <div class="form-group col-lg-12">
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <label class="control-label col-lg-4">Select Division
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-lg-8">
                        <select wire:model="division" class="form-control" name="division">
                            <option value="">--Select Division --</option>
                            @foreach($divisions as $d)
                                <option value="{{$d->id}}">
                                    {{$d->name}} ({{$d->bn_name}})
                                </option>
                            @endforeach
                        </select>


                    </div>
                </div>

            </div>


        </div>
    </div>


    <div class="form-group col-lg-12">
        <div class="row">
            @if(count($districts)>0)
                <div class="col-lg-6">
                    <div class="row">
                        <label class="control-label col-lg-4">Select District
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-lg-8">
                            <select wire:model="district" class="form-control" name="district">
                                <option value="">--Select District--</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}
                                        ({{$district->bn_name}})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif
                    @if(count($upazilas)>0)
                        <div class="col-lg-6">
                            <div class="row">
                                <label class="control-label col-lg-4">Select Thana
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-lg-8">
                                    <select wire:model="upazila" class="form-control select2" name="upazila">
                                        <option value="">--Select Thana--</option>
                                        @foreach($upazilas as $upazila)
                                            <option value="{{$upazila->id}}">{{$upazila->name}}
                                                ({{$upazila->bn_name}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
            @endif
        </div>
    </div>

</div>
