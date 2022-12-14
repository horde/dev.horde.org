<h3>Autoloading</h3>

<p>
 Horde/Imap_Client does not <a href="http://php.net/include"><code>include()</code></a> its own files, so
 an autoloader must be registered that will load the Horde/Imap_Client
 files from its PEAR directory.
 <a href="http://www.horde.org/libraries/Horde_Autoloader">Horde's Autoloader</a>
 package can be used to do this for you (or any other
 <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md">PSR-0</a>
 compliant autoloader).
</p>

<h3>Constructor</h3>

<p>
 Interaction with the mail server is handled through a
 <code>Horde_Imap_Client_Base</code> object. The object class will be
 one of the following:
</p>

<ul>
 <li><a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Socket.html"><code>Horde_Imap_Client_Socket</a></code> - IMAP
 <li><a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Socket_Pop3.html"><code>Horde_Imap_Client_Socket_Pop3</a></code> - POP3
</ul>

<p>
 The minimum necessary configuration needed for the Client constructor is
 the <code>username</code> and <code>password</code>. Although default
 values can be used for the <code>hostspec</code>, <code>port</code>, and
 <code>secure</code> options, it is generally a good idea to explicitly
 set these values to aid in debugging connection issues.
</p>

<h4>Debugging</h4>

<p>
 Debug output of the server protocol communication can be obtained by
 providing the 'debug' option. Acceptable values are any PHP supported
 wrapper that can be opened via the
 <a href="http://php.net/fopen"><code>fopen()</code></a> command. A plain
 string is inerpreted as a filename, which is probably what most people
 will want to use.
</p>

<h4>Caching</h4>

<p>TODO</p>

<h4>Example</h4>

<p>
 A sample constructor instantation (all further examples assume that this
 command has been performed and a client object is present in the
 <code>$client</code> variable):
</p>

<script type="syntaxhighlighter" class="brush: php"><![CDATA[
try {
    /* Connect to an IMAP server.
     *   - Use Horde_Imap_Client_Socket_Pop3 (and most likely port 110) to
     *     connect to a POP3 server instead. */
    $client = new Horde_Imap_Client_Socket(array(
        'username' => 'foo',
        'password' => 'secret',
        'hostspec' => 'localhost',
        'port' => '143',
        'secure' => 'tls',

        // OPTIONAL Debugging. Will output IMAP log to the /tmp/foo file
        'debug' => '/tmp/foo',

        // OPTIONAL Caching. Will use cache files in /tmp/hordecache.
        // Requires the Horde/Cache package, an optional dependency to
        // Horde/Imap_Client.
        'cache' => array(
            'backend' => new Horde_Imap_Client_Cache_Backend_Cache(array(
                'cacheob' => new Horde_Cache(new Horde_Cache_Storage_File(array(
                    'dir' => '/tmp/hordecache'
                )))
            ))
        )
    ));
} catch (Horde_Imap_Client_Exception $e) {
    // Any errors will cause an Exception.
}
]]></script>

<p>
 The full list of options can be found in the
 <a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Base.html#method___construct">API Documentation</a>.
</p>

<h3>Error Handling/Exceptions</h3>

<p>
 As noted in the constructor example, all errors encountered by the
 library will cause exceptions of the
 <code>Horde_Imap_Client_Exception</code> class (or a subclass of this
 base class) to be thrown.
</p>

<p>
 The exception message will contain a <em>translated</em> version of the
 error message. If the "raw" English version of the message is needed -
 i.e. for logging purposes - it can be found in the <code>$raw_msg</code>
 property.
</p>

<p>
 Further server debug information <em>might</em> be found in the
 <code>$details</code> property.
</p>

<ul>
 <li><a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Exception.html">API Documentation of the base exception class</a></li>
 <li><a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Exception.html#constant_ALREADYEXISTS">Error Message Code Constants</a></li>
</ul>

<h3>Working with a Single Mailbox</h3>

<p>
 The following examples assume that the user wants to work with the
 messages contained in their INBOX.
</p>

<h4>
 Loading Mailbox
</h4>

<p>
 There is <em>no need</em> to provide commands to login and/or switch to
 a mailbox. These actions are handled on-demand by the library.
</p>

<p>
 <span style="color:red">NOTE:</span> All mailbox arguments to methods in
 Horde/Imap_Client take the UTF-8 version of the mailbox name. There is no
 need to worry about converting from/to the internal UTF7-IMAP charset
 used on IMAP servers.
</p>

<p>
 Alternatively, you can use <a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Mailbox.html">Horde_Imap_Client_Mailbox</a>
 objects as the mailbox argument. This object can automatically convert
 the mailbox name if in UTF7-IMAP for you.  Example:
</p>

<script type="syntaxhighlighter" class="brush: php"><![CDATA[
// This creates a mailbox object from UTF-8 data.
$mbox1 = Horde_Imap_Client_Mailbox::create('Envoy??');

// This creates a mailbox object from UTF7-IMAP data.
$mbox2 = Horde_Imap_Client_Mailbox::create('Envoy&AOk-', true);

// $result === true
$result = ($mbox1 == $mbox2);
]]></script>

<h4>Listing Messages</h4>

<p>
 The <a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Base.html#method_search"><code>search()</code></a> command is used to list the messages in a mailbox. It only requires a mailbox name for basic
 usage, and will return a list of unsorted UIDs in the mailbox.
</p>

<script type="syntaxhighlighter" class="brush: php"><![CDATA[
// Get a list of all UIDs in the INBOX.
$results = $client->search('INBOX');

// $results['match'] contains a Horde_Imap_Client_Ids object, containing the
// list of UIDs in the INBOX.
$uids = $results['match'];
]]></script>

<p>
 To filter the list of messages returned by <code>search()</code>, a <a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Search_Query.html"><code>Horde_Imap_Client_Search_Query</code></a> object can be passed as the second parameter to <code>search()</code>. If not present, all messages in the mailbox are returned.
</p>

<p>
 The third argument to <code>search()</code> allows additional search parameters to be specified, such as the prefered sort order.
</p>

<script type="syntaxhighlighter" class="brush: php"><![CDATA[
// Advanced example to return the list of all unseen UIDs in the INBOX
// younger than a week, sorted by the From address.
$query = new Horde_Imap_Client_Search_Query();
$query->flag(Horde_Imap_Client::FLAG_SEEN, false);

// 604800 = 60 seconds * 60 minutes * 24 hours * 7 days (1 week)
$query->intervalSearch(
    604800,
    Horde_Imap_Client_Search_Query::INTERVAL_YOUNGER
);

$results = $client->search('INBOX', $query, array(
    'sort' => array(
        Horde_Imap_Client::SORT_FROM
    )
));

// $results['match'] contains a Horde_Imap_Client_Ids object, containing the
// list of UIDs in the INBOX.
$uids = $results['match'];
]]></script>

<p>
 In the examples above, <code>$uids</code> is a
 <a href="http://dev.horde.org/api/master/lib/Imap_Client/class-Horde_Imap_Client_Ids.html"><code>Horde_Imap_Client_Ids</code></a> object
 (all message ID lists are returned via this object in Horde/Imap_Client).
 This object implements both the <code>Countable</code> and
 <code>Traversable</code> classes, so it can be used directly in
 <code>count()</code> and <code>foreach()</code> commands. If a raw array
 is needed, it can be obtained from the object via the <code>$ids</code>
 property.
</p>
