{{-- Modal Component --}}
<div class="modal fade {{ $modalclass }}" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $labelledby }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable {{ $modalclasswidth }}">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $labelledby }}">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $content }}
            </div>
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>