
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:shankesgk2" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="shankesgk2.html">shankesgk2</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:shankesgk2_NetEaseIM" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="shankesgk2/NetEaseIM.html">NetEaseIM</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:shankesgk2_NetEaseIM_Exception" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="shankesgk2/NetEaseIM/Exception.html">Exception</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:shankesgk2_NetEaseIM_Exception_CodeStatus" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Exception/CodeStatus.html">CodeStatus</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_Exception_NetEaseIMException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Exception/NetEaseIMException.html">NetEaseIMException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:shankesgk2_NetEaseIM_Facade" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="shankesgk2/NetEaseIM/Facade.html">Facade</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:shankesgk2_NetEaseIM_Facade_NetEaseIM" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Facade/NetEaseIM.html">NetEaseIM</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:shankesgk2_NetEaseIM_Traits" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="shankesgk2/NetEaseIM/Traits.html">Traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:shankesgk2_NetEaseIM_Traits_ChatRoomTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html">ChatRoomTrait</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_Traits_HistoryTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Traits/HistoryTrait.html">HistoryTrait</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_Traits_MessageTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Traits/MessageTrait.html">MessageTrait</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_Traits_SmsTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Traits/SmsTrait.html">SmsTrait</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_Traits_TeamTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Traits/TeamTrait.html">TeamTrait</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_Traits_UserTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/Traits/UserTrait.html">UserTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_NetEaseIM" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/NetEaseIM.html">NetEaseIM</a>                    </div>                </li>                            <li data-name="class:shankesgk2_NetEaseIM_NetEaseIMServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html">NetEaseIMServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "shankesgk2.html", "name": "shankesgk2", "doc": "Namespace shankesgk2"},{"type": "Namespace", "link": "shankesgk2/NetEaseIM.html", "name": "shankesgk2\\NetEaseIM", "doc": "Namespace shankesgk2\\NetEaseIM"},{"type": "Namespace", "link": "shankesgk2/NetEaseIM/Exception.html", "name": "shankesgk2\\NetEaseIM\\Exception", "doc": "Namespace shankesgk2\\NetEaseIM\\Exception"},{"type": "Namespace", "link": "shankesgk2/NetEaseIM/Facade.html", "name": "shankesgk2\\NetEaseIM\\Facade", "doc": "Namespace shankesgk2\\NetEaseIM\\Facade"},{"type": "Namespace", "link": "shankesgk2/NetEaseIM/Traits.html", "name": "shankesgk2\\NetEaseIM\\Traits", "doc": "Namespace shankesgk2\\NetEaseIM\\Traits"},
            
            {"type": "Class", "fromName": "shankesgk2\\NetEaseIM\\Exception", "fromLink": "shankesgk2/NetEaseIM/Exception.html", "link": "shankesgk2/NetEaseIM/Exception/CodeStatus.html", "name": "shankesgk2\\NetEaseIM\\Exception\\CodeStatus", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Exception\\CodeStatus", "fromLink": "shankesgk2/NetEaseIM/Exception/CodeStatus.html", "link": "shankesgk2/NetEaseIM/Exception/CodeStatus.html#method_codeStatus", "name": "shankesgk2\\NetEaseIM\\Exception\\CodeStatus::codeStatus", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Exception\\CodeStatus", "fromLink": "shankesgk2/NetEaseIM/Exception/CodeStatus.html", "link": "shankesgk2/NetEaseIM/Exception/CodeStatus.html#method_codeStatusWithError", "name": "shankesgk2\\NetEaseIM\\Exception\\CodeStatus::codeStatusWithError", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "shankesgk2\\NetEaseIM\\Exception", "fromLink": "shankesgk2/NetEaseIM/Exception.html", "link": "shankesgk2/NetEaseIM/Exception/NetEaseIMException.html", "name": "shankesgk2\\NetEaseIM\\Exception\\NetEaseIMException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Exception\\NetEaseIMException", "fromLink": "shankesgk2/NetEaseIM/Exception/NetEaseIMException.html", "link": "shankesgk2/NetEaseIM/Exception/NetEaseIMException.html#method___construct", "name": "shankesgk2\\NetEaseIM\\Exception\\NetEaseIMException::__construct", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "shankesgk2\\NetEaseIM\\Facade", "fromLink": "shankesgk2/NetEaseIM/Facade.html", "link": "shankesgk2/NetEaseIM/Facade/NetEaseIM.html", "name": "shankesgk2\\NetEaseIM\\Facade\\NetEaseIM", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Facade\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM/Facade/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/Facade/NetEaseIM.html#method_getFacadeAccessor", "name": "shankesgk2\\NetEaseIM\\Facade\\NetEaseIM::getFacadeAccessor", "doc": "&quot;Get the registered name of the component.&quot;"},
            
            {"type": "Class", "fromName": "shankesgk2\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIM.html", "name": "shankesgk2\\NetEaseIM\\NetEaseIM", "doc": "&quot;\u7f51\u6613\u4e91\u4fe1API&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIM.html#method___construct", "name": "shankesgk2\\NetEaseIM\\NetEaseIM::__construct", "doc": "&quot;NetEaseIM constructor.&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIM.html#method_post", "name": "shankesgk2\\NetEaseIM\\NetEaseIM::post", "doc": "&quot;\u7ec4\u88c5\u7f51\u6613\u4e91\u63a5\u53e3\u5fc5\u8981\u6570\u636e,\u53d1\u9001http post\u8bf7\u6c42&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIM.html#method_setDebug", "name": "shankesgk2\\NetEaseIM\\NetEaseIM::setDebug", "doc": "&quot;\u8bbe\u7f6e\\GuzzleHttp\\Client\u8c03\u8bd5&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIM.html#method_boolConvertToString", "name": "shankesgk2\\NetEaseIM\\NetEaseIM::boolConvertToString", "doc": "&quot;\u5e03\u5c14\u8f6c\u5b57\u7b26\u4e32&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIM.html#method_arrCheckAndPush", "name": "shankesgk2\\NetEaseIM\\NetEaseIM::arrCheckAndPush", "doc": "&quot;\u6570\u7ec4\u68c0\u67e5\u8ffd\u52a0&quot;"},
            
            {"type": "Class", "fromName": "shankesgk2\\NetEaseIM", "fromLink": "shankesgk2/NetEaseIM.html", "link": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html", "name": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider", "fromLink": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html", "link": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html#method_boot", "name": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider::boot", "doc": "&quot;Boot the service provider.&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider", "fromLink": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html", "link": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html#method_register", "name": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider::register", "doc": "&quot;Register the service provider.&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider", "fromLink": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html", "link": "shankesgk2/NetEaseIM/NetEaseIMServiceProvider.html#method_provides", "name": "shankesgk2\\NetEaseIM\\NetEaseIMServiceProvider::provides", "doc": "&quot;Get the services provided by the provider.&quot;"},
            
            {"type": "Trait", "fromName": "shankesgk2\\NetEaseIM\\Traits", "fromLink": "shankesgk2/NetEaseIM/Traits.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "doc": "&quot;\u804a\u5929\u5ba4&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomCreate", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomCreate", "doc": "&quot;\u521b\u5efa\u804a\u5929\u5ba4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomGet", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomGet", "doc": "&quot;\u67e5\u8be2\u804a\u5929\u5ba4\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomGetBatch", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomGetBatch", "doc": "&quot;\u6279\u91cf\u67e5\u8be2\u804a\u5929\u5ba4\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomUpdate", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomUpdate", "doc": "&quot;\u66f4\u65b0\u804a\u5929\u5ba4\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomToggleCloseStatus", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomToggleCloseStatus", "doc": "&quot;\u4fee\u6539\u804a\u5929\u5ba4\u5f00\/\u5173\u95ed\u72b6\u6001&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomSetMemberRole", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomSetMemberRole", "doc": "&quot;\u8bbe\u7f6e\u804a\u5929\u5ba4\u5185\u7528\u6237\u89d2\u8272&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomRequestAddress", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomRequestAddress", "doc": "&quot;\u8bf7\u6c42\u804a\u5929\u5ba4\u5730\u5740\u4e0e\u4ee4\u724c&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomSendMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomSendMsg", "doc": "&quot;\u53d1\u9001\u804a\u5929\u5ba4\u6d88\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomSendTxtMessage", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomSendTxtMessage", "doc": "&quot;\u53d1\u9001\u804a\u5929\u5ba4\u6587\u5b57\u6d88\u606f\u5c01\u88c5&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomAddRobot", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomAddRobot", "doc": "&quot;\u5f80\u804a\u5929\u5ba4\u5185\u6dfb\u52a0\u673a\u5668\u4eba\uff0c\u673a\u5668\u4eba\u8fc7\u671f\u65f6\u95f4\u4e3a24\u5c0f\u65f6\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomRemoveRobot", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomRemoveRobot", "doc": "&quot;\u4ece\u804a\u5929\u5ba4\u5185\u5220\u9664\u673a\u5668\u4eba&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomTemporaryMute", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomTemporaryMute", "doc": "&quot;\u5c06\u804a\u5929\u5ba4\u5185\u6210\u5458\u8bbe\u7f6e\u4e3a\u4e34\u65f6\u7981\u8a00&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueueOffer", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueueOffer", "doc": "&quot;\u5f80\u804a\u5929\u5ba4\u6709\u5e8f\u961f\u5217\u4e2d\u65b0\u52a0\u6216\u66f4\u65b0\u5143\u7d20&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueuePoll", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueuePoll", "doc": "&quot;\u4ece\u961f\u5217\u4e2d\u53d6\u51fa\u5143\u7d20&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueueList", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueueList", "doc": "&quot;\u6392\u5e8f\u5217\u51fa\u961f\u5217\u4e2d\u6240\u6709\u5143\u7d20&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueueDrop", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueueDrop", "doc": "&quot;\u5220\u9664\u6e05\u7406\u6574\u4e2a\u961f\u5217&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueueInit", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueueInit", "doc": "&quot;\u521d\u59cb\u5316\u961f\u5217&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomMuteRoom", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomMuteRoom", "doc": "&quot;\u8bbe\u7f6e\u804a\u5929\u5ba4\u6574\u4f53\u7981\u8a00\u72b6\u6001\uff08\u4ec5\u521b\u5efa\u8005\u548c\u7ba1\u7406\u5458\u80fd\u53d1\u8a00\uff09&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomTopn", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomTopn", "doc": "&quot;\u67e5\u8be2\u804a\u5929\u5ba4\u7edf\u8ba1\u6307\u6807TopN&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomMembersByPage", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomMembersByPage", "doc": "&quot;\u5206\u9875\u83b7\u53d6\u6210\u5458\u5217\u8868&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueryMembers", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueryMembers", "doc": "&quot;\u6279\u91cf\u83b7\u53d6\u5728\u7ebf\u6210\u5458\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomUpdateMyRoomRole", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomUpdateMyRoomRole", "doc": "&quot;\u53d8\u66f4\u804a\u5929\u5ba4\u5185\u7684\u89d2\u8272\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueueBatchUpdateElements", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueueBatchUpdateElements", "doc": "&quot;\u6279\u91cf\u66f4\u65b0\u804a\u5929\u5ba4\u961f\u5217\u5143\u7d20&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html", "link": "shankesgk2/NetEaseIM/Traits/ChatRoomTrait.html#method_chatRoomQueryUserRoomIds", "name": "shankesgk2\\NetEaseIM\\Traits\\ChatRoomTrait::chatRoomQueryUserRoomIds", "doc": "&quot;\u67e5\u8be2\u7528\u6237\u521b\u5efa\u7684\u5f00\u542f\u72b6\u6001\u804a\u5929\u5ba4\u5217\u8868&quot;"},
            
            {"type": "Trait", "fromName": "shankesgk2\\NetEaseIM\\Traits", "fromLink": "shankesgk2/NetEaseIM/Traits.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "doc": "&quot;\u5386\u53f2\u8bb0\u5f55&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyQuerySessionMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyQuerySessionMsg", "doc": "&quot;\u5355\u804a\u4e91\u7aef\u5386\u53f2\u6d88\u606f\u67e5\u8be2&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyQueryTeamMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyQueryTeamMsg", "doc": "&quot;\u7fa4\u804a\u4e91\u7aef\u5386\u53f2\u6d88\u606f\u67e5\u8be2&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyQueryChatroomMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyQueryChatroomMsg", "doc": "&quot;\u804a\u5929\u5ba4\u4e91\u7aef\u5386\u53f2\u6d88\u606f\u67e5\u8be2\n\u6b64\u63a5\u53e3\u6709\u9891\u63a7\u9650\u5236\uff0c\u6bcf\u5206\u949f\u53ef\u8c03\u7528\u4e0d\u8d85\u8fc71200\u6b21&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyDeleteHistoryMessage", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyDeleteHistoryMessage", "doc": "&quot;\u5220\u9664\u804a\u5929\u5ba4\u4e91\u7aef\u5386\u53f2\u6d88\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyQueryUserEvents", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyQueryUserEvents", "doc": "&quot;\u7528\u6237\u767b\u5f55\u767b\u51fa\u4e8b\u4ef6\u8bb0\u5f55\u67e5\u8be2\n\u8ddf\u636e\u65f6\u95f4\u6bb5\u67e5\u8be2\u7528\u6237\u7684\u767b\u5f55\u767b\u51fa\u8bb0\u5f55\uff0c\u6bcf\u6b21\u6700\u591a\u8fd4\u56de100\u6761\u3002\n\u4e0d\u63d0\u4f9b\u5206\u9875\u652f\u6301\uff0c\u7b2c\u4e09\u65b9\u9700\u8981\u8ddf\u636e\u65f6\u95f4\u6bb5\u6765\u67e5\u8be2\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyDeleteMediaFile", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyDeleteMediaFile", "doc": "&quot;\u5220\u9664\u97f3\u89c6\u9891\/\u767d\u677f\u670d\u52a1\u5668\u5f55\u5236\u6587\u4ef6&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyQueryBroadcastMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyQueryBroadcastMsg", "doc": "&quot;\u6279\u91cf\u67e5\u8be2\u5e7f\u64ad\u6d88\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html", "link": "shankesgk2/NetEaseIM/Traits/HistoryTrait.html#method_historyQueryBroadcastMsgById", "name": "shankesgk2\\NetEaseIM\\Traits\\HistoryTrait::historyQueryBroadcastMsgById", "doc": "&quot;\u67e5\u8be2\u5355\u6761\u5e7f\u64ad\u6d88\u606f&quot;"},
            
            {"type": "Trait", "fromName": "shankesgk2\\NetEaseIM\\Traits", "fromLink": "shankesgk2/NetEaseIM/Traits.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "doc": "&quot;\u6d88\u606f\u529f\u80fd&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageSendMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageSendMsg", "doc": "&quot;\u53d1\u9001\u666e\u901a\u6d88\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageSendTxtMsgToUser", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageSendTxtMsgToUser", "doc": "&quot;\u7ed9\u4e2a\u4eba\u53d1\u9001\u6587\u672c\u6d88\u606f\u5c01\u88c5&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageSendCustomMsgToUser", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageSendCustomMsgToUser", "doc": "&quot;\u7ed9\u4e2a\u4eba\u53d1\u9001\u81ea\u5b9a\u4e49\u6d88\u606f\u5c01\u88c5&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgSendBatchMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgSendBatchMsg", "doc": "&quot;\u6279\u91cf\u53d1\u9001\u70b9\u5bf9\u70b9\u666e\u901a\u6d88\u606f\n1.\u7ed9\u7528\u6237\u53d1\u9001\u70b9\u5bf9\u70b9\u666e\u901a\u6d88\u606f\uff0c\u5305\u62ec\u6587\u672c\uff0c\u56fe\u7247\uff0c\u8bed\u97f3\uff0c\u89c6\u9891\uff0c\u5730\u7406\u4f4d\u7f6e\u548c\u81ea\u5b9a\u4e49\u6d88\u606f\u3002\n2.\u6700\u5927\u9650500\u4eba\uff0c\u53ea\u80fd\u9488\u5bf9\u4e2a\u4eba,\u5982\u679c\u6279\u91cf\u63d0\u4f9b\u7684\u5e10\u53f7\u4e2d\u6709\u672a\u6ce8\u518c\u7684\u5e10\u53f7\uff0c\u4f1a\u63d0\u793a\u5e76\u8fd4\u56de\u7ed9\u7528\u6237\u3002\n3.\u6b64\u63a5\u53e3\u53d7\u9891\u7387\u63a7\u5236\uff0c\u4e00\u4e2a\u5e94\u7528\u4e00\u5206\u949f\u6700\u591a\u8c03\u7528120\u6b21\uff0c\u8d85\u8fc7\u4f1a\u8fd4\u56de416\u72b6\u6001\u7801\uff0c\u5e76\u4e14\u88ab\u5c4f\u853d\u4e00\u6bb5\u65f6\u95f4\uff1b\n\u5177\u4f53\u6d88\u606f\u53c2\u8003\u5b98\u65b9\u6587\u6863\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgSendAttachMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgSendAttachMsg", "doc": "&quot;\u53d1\u9001\u81ea\u5b9a\u4e49\u7cfb\u7edf\u901a\u77e5\n1.\u81ea\u5b9a\u4e49\u7cfb\u7edf\u901a\u77e5\u533a\u522b\u4e8e\u666e\u901a\u6d88\u606f\uff0c\u65b9\u4fbf\u5f00\u53d1\u8005\u8fdb\u884c\u4e1a\u52a1\u903b\u8f91\u7684\u901a\u77e5\uff1b\n2.\u76ee\u524d\u652f\u6301\u4e24\u79cd\u7c7b\u578b\uff1a\u70b9\u5bf9\u70b9\u7c7b\u578b\u548c\u7fa4\u7c7b\u578b\uff08\u4ec5\u9650\u9ad8\u7ea7\u7fa4\uff09\uff0c\u6839\u636emsgType\u6709\u6240\u533a\u522b\u3002\n\u5e94\u7528\u573a\u666f\uff1a\u5982\u67d0\u4e2a\u7528\u6237\u7ed9\u53e6\u4e00\u4e2a\u7528\u6237\u53d1\u9001\u597d\u53cb\u8bf7\u6c42\u4fe1\u606f\u7b49\uff0c\u5177\u4f53attach\u4e3a\u8bf7\u6c42\u6d88\u606f\u4f53\uff0c\u7b2c\u4e09\u65b9\u53ef\u4ee5\u81ea\u884c\u6269\u5c55\uff0c\u5efa\u8bae\u662fjson\u683c\u5f0f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgSendBatchAttachMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgSendBatchAttachMsg", "doc": "&quot;\u6279\u91cf\u53d1\u9001\u70b9\u5bf9\u70b9\u81ea\u5b9a\u4e49\u7cfb\u7edf\u901a\u77e5\n1.\u7cfb\u7edf\u901a\u77e5\u533a\u522b\u4e8e\u666e\u901a\u6d88\u606f\uff0c\u5e94\u7528\u63a5\u6536\u5230\u76f4\u63a5\u4ea4\u7ed9\u4e0a\u5c42\u5904\u7406\uff0c\u5ba2\u6237\u7aef\u53ef\u4e0d\u505a\u5c55\u793a\uff1b\n2.\u76ee\u524d\u652f\u6301\u7c7b\u578b\uff1a\u70b9\u5bf9\u70b9\u7c7b\u578b\uff1b\n3.\u6700\u5927\u9650500\u4eba\uff0c\u53ea\u80fd\u9488\u5bf9\u4e2a\u4eba,\u5982\u679c\u6279\u91cf\u63d0\u4f9b\u7684\u5e10\u53f7\u4e2d\u6709\u672a\u6ce8\u518c\u7684\u5e10\u53f7\uff0c\u4f1a\u63d0\u793a\u5e76\u8fd4\u56de\u7ed9\u7528\u6237\uff1b\n4.\u6b64\u63a5\u53e3\u53d7\u9891\u7387\u63a7\u5236\uff0c\u4e00\u4e2a\u5e94\u7528\u4e00\u5206\u949f\u6700\u591a\u8c03\u7528120\u6b21\uff0c\u8d85\u8fc7\u4f1a\u8fd4\u56de416\u72b6\u6001\u7801\uff0c\u5e76\u4e14\u88ab\u5c4f\u853d\u4e00\u6bb5\u65f6\u95f4\uff1b\n\u5e94\u7528\u573a\u666f\uff1a\u5982\u67d0\u4e2a\u7528\u6237\u7ed9\u53e6\u4e00\u4e2a\u7528\u6237\u53d1\u9001\u597d\u53cb\u8bf7\u6c42\u4fe1\u606f\u7b49\uff0c\u5177\u4f53attach\u4e3a\u8bf7\u6c42\u6d88\u606f\u4f53\uff0c\u7b2c\u4e09\u65b9\u53ef\u4ee5\u81ea\u884c\u6269\u5c55\uff0c\u5efa\u8bae\u662fjson\u683c\u5f0f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgUpload", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgUpload", "doc": "&quot;\u6587\u4ef6\u4e0a\u4f20\n\u6587\u4ef6\u4e0a\u4f20\uff0c\u5b57\u7b26\u6d41\u9700\u8981base64\u7f16\u7801\uff0c\u6700\u592715M\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgFileUpload", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgFileUpload", "doc": "&quot;\u6587\u4ef6\u4e0a\u4f20\uff08multipart\u65b9\u5f0f\uff09\n\u6587\u4ef6\u4e0a\u4f20\uff0c\u6700\u592715M&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgRecall", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgRecall", "doc": "&quot;\u6d88\u606f\u64a4\u56de\n\u6d88\u606f\u64a4\u56de\u63a5\u53e3\uff0c\u53ef\u4ee5\u64a4\u56de\u4e00\u5b9a\u65f6\u95f4\u5185\u7684\u70b9\u5bf9\u70b9\u4e0e\u7fa4\u6d88\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/MessageTrait.html", "link": "shankesgk2/NetEaseIM/Traits/MessageTrait.html#method_messageMsgBroadcastMsg", "name": "shankesgk2\\NetEaseIM\\Traits\\MessageTrait::messageMsgBroadcastMsg", "doc": "&quot;\u53d1\u9001\u5e7f\u64ad\u6d88\u606f\n1\u3001\u5e7f\u64ad\u6d88\u606f\uff0c\u53ef\u4ee5\u5bf9\u5e94\u7528\u5185\u7684\u6240\u6709\u7528\u6237\u53d1\u9001\u5e7f\u64ad\u6d88\u606f\uff0c\u5e7f\u64ad\u6d88\u606f\u76ee\u524d\u6682\u4e0d\u652f\u6301\u7b2c\u4e09\u65b9\u63a8\u9001\uff08APNS\u3001\u5c0f\u7c73\u3001\u534e\u4e3a\u7b49\uff09\uff1b\n2\u3001\u5e7f\u64ad\u6d88\u606f\u652f\u6301\u79bb\u7ebf\u5b58\u50a8\uff0c\u5e76\u53ef\u4ee5\u81ea\u5b9a\u4e49\u8bbe\u7f6e\u79bb\u7ebf\u5b58\u50a8\u7684\u6709\u6548\u671f\uff0c\u6700\u591a\u4fdd\u7559\u6700\u8fd1100\u6761\u79bb\u7ebf\u5e7f\u64ad\u6d88\u606f\uff1b\n3\u3001\u6b64\u63a5\u53e3\u53d7\u9891\u7387\u63a7\u5236\uff0c\u4e00\u4e2a\u5e94\u7528\u4e00\u5206\u949f\u6700\u591a\u8c03\u752810\u6b21\uff0c\u4e00\u5929\u6700\u591a\u8c03\u75281000\u6b21\uff0c\u8d85\u8fc7\u4f1a\u8fd4\u56de416\u72b6\u6001\u7801\uff1b\n4\u3001\u8be5\u529f\u80fd\u76ee\u524d\u9700\u7533\u8bf7\u5f00\u901a\uff0c\u8be6\u60c5\u53ef\u54a8\u8be2\u60a8\u7684\u5ba2\u6237\u7ecf\u7406\u3002&quot;"},
            
            {"type": "Trait", "fromName": "shankesgk2\\NetEaseIM\\Traits", "fromLink": "shankesgk2/NetEaseIM/Traits.html", "link": "shankesgk2/NetEaseIM/Traits/SmsTrait.html", "name": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait", "doc": "&quot;\u77ed\u4fe1\u529f\u80fd&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/SmsTrait.html", "link": "shankesgk2/NetEaseIM/Traits/SmsTrait.html#method_smsSendcode", "name": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait::smsSendcode", "doc": "&quot;\u53d1\u9001\u77ed\u4fe1\/\u8bed\u97f3\u77ed\u4fe1\u9a8c\u8bc1\u7801&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/SmsTrait.html", "link": "shankesgk2/NetEaseIM/Traits/SmsTrait.html#method_smsVerifycode", "name": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait::smsVerifycode", "doc": "&quot;\u6821\u9a8c\u6307\u5b9a\u624b\u673a\u53f7\u7684\u9a8c\u8bc1\u7801\u662f\u5426\u5408\u6cd5\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/SmsTrait.html", "link": "shankesgk2/NetEaseIM/Traits/SmsTrait.html#method_smsSendtemplate", "name": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait::smsSendtemplate", "doc": "&quot;\u53d1\u9001\u6a21\u677f\u77ed\u4fe1&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/SmsTrait.html", "link": "shankesgk2/NetEaseIM/Traits/SmsTrait.html#method_smsQuerystatus", "name": "shankesgk2\\NetEaseIM\\Traits\\SmsTrait::smsQuerystatus", "doc": "&quot;\u67e5\u8be2\u901a\u77e5\u7c7b\u548c\u8fd0\u8425\u7c7b\u77ed\u4fe1\u53d1\u9001\u72b6\u6001\n\u6839\u636e\u77ed\u4fe1\u7684sendid(sendtemplate.action\u63a5\u53e3\u4e2d\u7684\u8fd4\u56de\u503c)\uff0c\u67e5\u8be2\u77ed\u4fe1\u53d1\u9001\u7ed3\u679c\u3002&quot;"},
            
            {"type": "Trait", "fromName": "shankesgk2\\NetEaseIM\\Traits", "fromLink": "shankesgk2/NetEaseIM/Traits.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "doc": "&quot;\u7fa4\u7ec4\u529f\u80fd(\u9ad8\u7ea7\u7fa4)&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamCreate", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamCreate", "doc": "&quot;\u521b\u5efa\u7fa4\u7ec4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamAdd", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamAdd", "doc": "&quot;\u62c9\u4eba\u5165\u7fa4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamKick", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamKick", "doc": "&quot;\u8e22\u4eba\u51fa\u7fa4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamRemove", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamRemove", "doc": "&quot;\u89e3\u6563\u7fa4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamUpdate", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamUpdate", "doc": "&quot;\u66f4\u65b0\u7fa4\u7ec4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamQuery", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamQuery", "doc": "&quot;\u7fa4\u4fe1\u606f\u4e0e\u6210\u5458\u5217\u8868\u67e5\u8be2\n\u9ad8\u7ea7\u7fa4\u4fe1\u606f\u4e0e\u6210\u5458\u5217\u8868\u67e5\u8be2\uff0c\u4e00\u6b21\u6700\u591a\u67e5\u8be230\u4e2a\u7fa4\u76f8\u5173\u7684\u4fe1\u606f\uff0c\u8ddf\u636eope\u53c2\u6570\u6765\u63a7\u5236\u662f\u5426\u5e26\u4e0a\u7fa4\u6210\u5458\u5217\u8868\uff1b\n\u67e5\u8be2\u7fa4\u6210\u5458\u4f1a\u7a0d\u5fae\u6162\u4e00\u4e9b\uff0c\u6240\u4ee5\u5982\u679c\u4e0d\u9700\u8981\u7fa4\u6210\u5458\u5217\u8868\u53ef\u4ee5\u53ea\u67e5\u7fa4\u4fe1\u606f\uff1b\n\u6b64\u63a5\u53e3\u53d7\u9891\u7387\u63a7\u5236\uff0c\u67d0\u4e2a\u5e94\u7528\u4e00\u5206\u949f\u6700\u591a\u67e5\u8be230\u6b21\uff0c\u8d85\u8fc7\u4f1a\u8fd4\u56de416\uff0c\u5e76\u4e14\u88ab\u5c4f\u853d\u4e00\u6bb5\u65f6\u95f4\uff1b\n\u7fa4\u6210\u5458\u7684\u7fa4\u5217\u8868\u4fe1\u606f\u4e2d\u589e\u52a0\u7ba1\u7406\u5458\u6210\u5458admins\u7684\u8fd4\u56de&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamQueryDetail", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamQueryDetail", "doc": "&quot;\u83b7\u53d6\u7fa4\u7ec4\u8be6\u7ec6\u4fe1\u606f\n\u67e5\u8be2\u6307\u5b9a\u7fa4\u7684\u8be6\u7ec6\u4fe1\u606f\uff08\u7fa4\u4fe1\u606f+\u6210\u5458\u8be6\u7ec6\u4fe1\u606f\uff09&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamGetMarkReadInfo", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamGetMarkReadInfo", "doc": "&quot;\u83b7\u53d6\u7fa4\u7ec4\u5df2\u8bfb\u6d88\u606f\u7684\u5df2\u8bfb\u8be6\u60c5\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_TeamChangeOwner", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::TeamChangeOwner", "doc": "&quot;\u79fb\u4ea4\u7fa4\u4e3b\n\u8f6c\u6362\u7fa4\u4e3b\u8eab\u4efd\uff1b\n\u7fa4\u4e3b\u53ef\u4ee5\u9009\u62e9\u79bb\u5f00\u6b64\u7fa4\uff0c\u8fd8\u662f\u7559\u4e0b\u6765\u6210\u4e3a\u666e\u901a\u6210\u5458\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamAddManager", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamAddManager", "doc": "&quot;\u4efb\u547d\u7ba1\u7406\u5458\n\u63d0\u5347\u666e\u901a\u6210\u5458\u4e3a\u7fa4\u7ba1\u7406\u5458\uff0c\u53ef\u4ee5\u6279\u91cf\uff0c\u4f46\u662f\u4e00\u6b21\u6dfb\u52a0\u6700\u591a\u4e0d\u8d85\u8fc710\u4e2a\u4eba\u3002&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamRemoveManager", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamRemoveManager", "doc": "&quot;\u79fb\u9664\u7ba1\u7406\u5458\n\u89e3\u9664\u7ba1\u7406\u5458\u8eab\u4efd\uff0c\u53ef\u4ee5\u6279\u91cf\uff0c\u4f46\u662f\u4e00\u6b21\u89e3\u9664\u6700\u591a\u4e0d\u8d85\u8fc710\u4e2a\u4eba&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamJoinTeams", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamJoinTeams", "doc": "&quot;\u83b7\u53d6\u67d0\u4e2a\u7528\u6237\u6240\u52a0\u5165\u9ad8\u7ea7\u7fa4\u7684\u7fa4\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamUpdateTeamNick", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamUpdateTeamNick", "doc": "&quot;\u4fee\u6539\u7fa4\u6635\u79f0&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamMuteTeam", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamMuteTeam", "doc": "&quot;\u4fee\u6539\u6d88\u606f\u63d0\u9192\u5f00\u5173&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamMuteTlist", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamMuteTlist", "doc": "&quot;\u7981\u8a00\u7fa4\u6210\u5458&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamLeave", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamLeave", "doc": "&quot;\u4e3b\u52a8\u9000\u7fa4&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamMuteTlistAll", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamMuteTlistAll", "doc": "&quot;\u5c06\u7fa4\u7ec4\u6574\u4f53\u7981\u8a00&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/TeamTrait.html", "link": "shankesgk2/NetEaseIM/Traits/TeamTrait.html#method_teamListTeamMute", "name": "shankesgk2\\NetEaseIM\\Traits\\TeamTrait::teamListTeamMute", "doc": "&quot;\u83b7\u53d6\u7fa4\u7ec4\u7981\u8a00\u5217\u8868&quot;"},
            
            {"type": "Trait", "fromName": "shankesgk2\\NetEaseIM\\Traits", "fromLink": "shankesgk2/NetEaseIM/Traits.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "doc": "&quot;\u7f51\u6613\u4e91\u901a\u4fe1ID \u7528\u6237\u540d\u7247\u3001\u8bbe\u7f6e\u3001\u5173\u7cfb\u6258\u7ba1&quot;"},
                                                        {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userCreateUserId", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userCreateUserId", "doc": "&quot;\u521b\u5efa\u4e91\u4fe1ID\n1.\u7b2c\u4e09\u65b9\u5e10\u53f7\u5bfc\u5165\u5230\u4e91\u4fe1\u5e73\u53f0\uff1b\n2.\u6ce8\u610faccid\uff0cname\u957f\u5ea6\u4ee5\u53ca\u8003\u8651\u7ba1\u7406\u79d8\u94a5token&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userUpdateUserId", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userUpdateUserId", "doc": "&quot;\u66f4\u65b0\u4e91\u4fe1ID&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userRefreshToken", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userRefreshToken", "doc": "&quot;\u66f4\u65b0\u5e76\u83b7\u53d6\u65b0token&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userBlockUser", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userBlockUser", "doc": "&quot;\u5c01\u7981\u7f51\u6613\u4e91\u901a\u4fe1ID&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userUnBlockUser", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userUnBlockUser", "doc": "&quot;\u89e3\u5c01\u7f51\u6613\u4e91\u901a\u4fe1ID&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userUpdateUserInfo", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userUpdateUserInfo", "doc": "&quot;\u66f4\u65b0\u7528\u6237\u540d\u7247&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userGetUserInfo", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userGetUserInfo", "doc": "&quot;\u83b7\u53d6\u7528\u6237\u540d\u7247&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userSetDonnop", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userSetDonnop", "doc": "&quot;\u8bbe\u7f6e\u684c\u9762\u7aef\u5728\u7ebf\u65f6\uff0c\u79fb\u52a8\u7aef\u662f\u5426\u9700\u8981\u63a8\u9001&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userMute", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userMute", "doc": "&quot;\u8d26\u53f7\u5168\u5c40\u7981\u8a00\n\u8bbe\u7f6e\u6216\u53d6\u6d88\u8d26\u53f7\u7684\u5168\u5c40\u7981\u8a00\u72b6\u6001\uff1b\u8d26\u53f7\u88ab\u8bbe\u7f6e\u4e3a\u5168\u5c40\u7981\u8a00\u540e\uff0c\u4e0d\u80fd\u53d1\u9001\u201c\u70b9\u5bf9\u70b9\u201d\u3001\u201c\u7fa4\u201d\u3001\u201c\u804a\u5929\u5ba4\u201d\u6d88\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userMuteAv", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userMuteAv", "doc": "&quot;\u8d26\u53f7\u5168\u5c40\u7981\u7528\u97f3\u89c6\u9891\n\u8d26\u53f7\u88ab\u8bbe\u7f6e\u4e3a\u7981\u7528\u97f3\u89c6\u9891\u540e\uff0c\u4e0d\u80fd\u53d1\u8d77\u70b9\u5bf9\u70b9\u97f3\u89c6\u9891\u3001\u521b\u5efa\u591a\u4eba\u97f3\u89c6\u9891\u3001\u53d1\u8d77\u70b9\u5bf9\u70b9\u767d\u677f\u3001\u521b\u5efa\u591a\u4eba\u767d\u677f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userAddFriend", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userAddFriend", "doc": "&quot;\u6dfb\u52a0\u597d\u53cb&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userUpdateFriend", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userUpdateFriend", "doc": "&quot;\u66f4\u65b0\u597d\u53cb\u76f8\u5173\u4fe1\u606f&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userDeleteFriend", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userDeleteFriend", "doc": "&quot;\u5220\u9664\u597d\u53cb&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userGetFriend", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userGetFriend", "doc": "&quot;\u83b7\u53d6\u597d\u53cb\u5173\u7cfb&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userSetSpecialRelation", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userSetSpecialRelation", "doc": "&quot;\u8bbe\u7f6e\u9ed1\u540d\u5355\/\u9759\u97f3&quot;"},
                    {"type": "Method", "fromName": "shankesgk2\\NetEaseIM\\Traits\\UserTrait", "fromLink": "shankesgk2/NetEaseIM/Traits/UserTrait.html", "link": "shankesgk2/NetEaseIM/Traits/UserTrait.html#method_userListBlackAndMuteList", "name": "shankesgk2\\NetEaseIM\\Traits\\UserTrait::userListBlackAndMuteList", "doc": "&quot;\u67e5\u770b\/\u83b7\u53d6 \u6307\u5b9a\u7528\u6237\u7684\u9ed1\u540d\u5355\u548c\u9759\u97f3\u5217\u8868&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


