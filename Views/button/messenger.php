<div id="btn-messenger"
     style="cursor: pointer;position: fixed;right: 30px;bottom: 80px;z-index:200;width: 14% ">
    <div style="visibility: visible;">
        <div tabindex="0" role="button">
            <div style="align-items: flex-start; background: rgb(255, 255, 255); border-radius: 18px; bottom: 0px; box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 12px 0px; cursor: pointer; display: flex; flex-direction: row; padding: 8px 0px 8px 12px; position: absolute;">
                <div style="display: inline-block;
                font-size: 17px;
                line-height: 22px;
                padding-right: 18px; text-align: left; width: 90%; overflow-wrap: break-word;">
                    bạn cần hỗ trợ về vấn đề gì hãy nhắn tin cho tôi!
                </div>
            </div>
        </div>

        <div style="cursor: pointer; position: absolute;
        right: -4px; top: -60px; width: 38px;">
            <div tabindex="0" role="button" style="outline: none;">
                <svg id="closeButton" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M19 32C26.732 32 33 25.732 33 18C33 10.268 26.732 4 19 4C11.268 4 5 10.268 5 18C5 25.732 11.268 32 19 32Z"
                              fill="white"></path>
                    </g>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M24.5413 18.875H13.458C12.9747 18.875 12.583 18.4833 12.583 18C12.583 17.5167 12.9747 17.125 13.458 17.125H24.5413C25.0246 17.125 25.4163 17.5167 25.4163 18C25.4163 18.4833 25.0246 18.875 24.5413 18.875Z"
                          fill="black"></path>
                    <defs>
                        <filter id="filter0_d" x="0" y="0" width="38" height="38" filterUnits="userSpaceOnUse"
                                color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                            <feOffset dy="1"></feOffset>
                            <feGaussianBlur stdDeviation="2.5"></feGaussianBlur>
                            <feColorMatrix type="matrix"
                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
    </div>
</div>
<div id="btn-messenger"
     style="cursor: pointer;position: fixed;right: 30px;bottom: 30px;">
    <div>
        <div style="display: flex; align-items: center; ">
            <div style="width: 60px; height: 60px; background-color: #0A7CFF; display: flex; justify-content: center; align-items: center; border-radius:60px">
                <svg width="36" height="36" viewBox="0 0 36 36">
                    <path fill="white"
                          d="M1 17.99C1 8.51488 8.42339 1.5 18 1.5C27.5766 1.5 35 8.51488 35 17.99C35 27.4651 27.5766 34.48 18 34.48C16.2799 34.48 14.6296 34.2528 13.079 33.8264C12.7776 33.7435 12.4571 33.767 12.171 33.8933L8.79679 35.3828C7.91415 35.7724 6.91779 35.1446 6.88821 34.1803L6.79564 31.156C6.78425 30.7836 6.61663 30.4352 6.33893 30.1868C3.03116 27.2287 1 22.9461 1 17.99ZM12.7854 14.8897L7.79161 22.8124C7.31238 23.5727 8.24695 24.4295 8.96291 23.8862L14.327 19.8152C14.6899 19.5398 15.1913 19.5384 15.5557 19.8116L19.5276 22.7905C20.7193 23.6845 22.4204 23.3706 23.2148 22.1103L28.2085 14.1875C28.6877 13.4272 27.7531 12.5704 27.0371 13.1137L21.673 17.1847C21.3102 17.4601 20.8088 17.4616 20.4444 17.1882L16.4726 14.2094C15.2807 13.3155 13.5797 13.6293 12.7854 14.8897Z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the SVG element by its id
        var closeButton = document.getElementById("closeButton");

        // Get the "btn-messenger" div
        var btnMessenger = document.getElementById("btn-messenger");

        // Add a click event listener to the SVG element
        closeButton.addEventListener("click", function () {
            // Hide the "btn-messenger" div by setting its display property to "none"
            btnMessenger.style.display = "none";
        });
    });

</script>