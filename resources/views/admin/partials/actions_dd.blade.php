<div class="visible-md visible-lg hidden-sm hidden-xs">
    <a href="{{ route('admin.' . $model . '.show', $id) }}">
        <button type="button" class="btn btn-xs btn-info"
                data-toggle="tooltip" data-placement="top" title="@lang('general.show')"><i
                    class="fa fa-eye"></i>
        </button>
    </a>
    <a href="{{ route('admin.' . $model . '.edit', $id) }}">
        <button type="button" class="btn btn-xs btn-primary"
                data-toggle="tooltip" data-placement="top" title="@lang('general.edit')"><i
                    class="fa fa-edit"></i>
        </button>
    </a>
    <a href="{{ route('admin.' . $model . '.delete', $id) }}">
        <button type="button" class="btn btn-xs btn-danger"
                data-toggle="tooltip" data-placement="top" title="@lang('general.delete')"><i
                    class="fa fa-trash-o"></i>
        </button>
    </a>
</div>
