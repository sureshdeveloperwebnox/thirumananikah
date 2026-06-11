@foreach ($chats->reverse() as $chat)
    @if ($chat->sender_user_id == Auth::user()->id)
        @if ($chat->message != null)
            <div class="chat-coversation right">
                <div class="media">
                    <div class="media-body">
                        <div class="text bg-soft-primary text-dark">{{ $chat->message }}</div>
                        <span class="time">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans() }}</span>
                    </div>
                    <span class="avatar avatar-xs flex-shrink-0">
                        <img src="{{ $chat->sender->photo != null ? uploaded_asset($chat->sender->photo) : static_avatar($chat->sender) }}">
                    </span>
                </div>
            </div>
        @endif
        @if ($chat->attachment != null)
            <div class="chat-coversation right">
                <div class="media">
                    <div class="media-body">
                        <div class="file-preview box sm">
                            @foreach (json_decode($chat->attachment) as $key => $attachment_id)
                                @php
                                    $attachment = \App\Models\Upload::find($attachment_id);
                                @endphp
                                @if ($attachment != null)
                                    @if ($attachment->type == 'image')
                                        <div class="mb-2 file-preview-item" title="{{ $attachment->file_name }}">
                                            <div class="thumb" onclick="openImageModal('{{ static_asset($attachment->file_name) }}')">
                                                <img src="{{ static_asset($attachment->file_name) }}" class="img-fit">
                                            </div>
                                            <div class="body">
                                                <h6 class="d-flex">
                                                    <span class="text-truncate title">{{ $attachment->file_original_name }}</span>
                                                    <span class="ext">.{{ $attachment->extension }}</span>
                                                </h6>
                                                <p>{{formatBytes($attachment->file_size)}}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="mb-2 file-preview-item" title="{{ $attachment->file_name }}">
                                            <div class="thumb">
                                                <i class="la la-file-text"></i>
                                            </div>
                                            <div class="body">
                                                <h6 class="d-flex">
                                                    <span class="text-truncate title">{{ $attachment->file_original_name }}</span>
                                                    <span class="ext">.{{ $attachment->extension }}</span>
                                                </h6>
                                                <p>{{formatBytes($attachment->file_size)}}</p>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        {{ translate('No attachment') }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <span class="time">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans() }}</span>
                    </div>
                    <span class="avatar avatar-xs flex-shrink-0">
                        <img src="{{ $chat->sender->photo != null ? uploaded_asset($chat->sender->photo) : static_avatar($chat->sender) }}">
                    </span>
                </div>
            </div>
        @endif
    @else
        @if ($chat->message != null)
            <div class="chat-coversation">
                <div class="media">
                    <span class="avatar avatar-xs flex-shrink-0">
                        <img src="{{ $chat->sender->photo != null ? uploaded_asset($chat->sender->photo) : static_avatar($chat->sender) }}">
                    </span>
                    <div class="media-body">
                        <div class="text">{{ $chat->message }}</div>
                        <span class="time">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        @endif
        @if ($chat->attachment != null)
            <div class="chat-coversation">
                <div class="media">
                    <span class="avatar avatar-xs flex-shrink-0">
                        <img src="{{ $chat->sender->photo != null ? uploaded_asset($chat->sender->photo) : static_avatar($chat->sender) }}">
                    </span>
                    <div class="media-body">
                        <div class="file-preview box sm">
                            @foreach (json_decode($chat->attachment) as $key => $attachment_id)
                                @php
                                    $attachment = \App\Models\Upload::find($attachment_id);
                                @endphp
                                @if ($attachment != null)
                                    @if ($attachment->type == 'image')
                                        <div class="mb-2 file-preview-item" title="{{ $attachment->file_name }}">
                                            <div class="thumb" onclick="openImageModal('{{ static_asset($attachment->file_name) }}')">
                                                <img src="{{ static_asset($attachment->file_name) }}" class="img-fit">
                                            </div>
                                            <div class="body">
                                                <h6 class="d-flex">
                                                    <span class="text-truncate title">{{ $attachment->file_original_name }}</span>
                                                    <span class="ext">.{{ $attachment->extension }}</span>
                                                </h6>
                                                <p>{{formatBytes($attachment->file_size)}}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="mb-2 file-preview-item" title="{{ $attachment->file_name }}">
                                            <div class="thumb">
                                                <i class="la la-file-text"></i>
                                            </div>
                                            <div class="body">
                                                <h6 class="d-flex">
                                                    <span class="text-truncate title">{{ $attachment->file_original_name }}</span>
                                                    <span class="ext">.{{ $attachment->extension }}</span>
                                                </h6>
                                                <p>{{formatBytes($attachment->file_size)}}</p>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        {{ translate('No attachment') }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <span class="time">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endforeach

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Image Preview">
            </div>
            <div class="modal-footer">
                <a id="downloadLink" href="#" class="btn btn-primary" download>Download</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openImageModal(imageUrl) {
        // Set the image source
        document.getElementById('modalImage').src = imageUrl;
        // Set the download link
        document.getElementById('downloadLink').href = imageUrl;
        // Open the modal
        $('#imageModal').modal('show');
    }
</script>
