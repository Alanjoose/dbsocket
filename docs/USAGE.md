# DBSocket

## Usage guide

### Configuration

<p>
    To use the package you must run the <code>composer install</code> command. And then configure
    your server environment, since the connector uses the settings in this way.
    The variables used are the following:
</p>
<ul>
    <li><code>DB_DRIVER</code></li>
    <li><code>DB_HOST</code></li>
    <li><code>DB_PORT</code></li>
    <li><code>DB_NAME</code></li>
    <li><code>DB_USERNAME</code></li>
    <li><code>DB_PASSWORD</code></li>
    <li><code>DB_CHARSET</code></li>
    <li><code>DB_USE_UNIX_SOCKET</code></li>
</ul>
<p>
    These variables can be defined by the super global <code>$_ENV</code>.<br>
    <b>Note: There are DBMS models that allow some of them to be omitted.</b>
</p>

#### TIP
<p>
    You can use the <a href="https://packagist.org/packages/vlucas/phpdotenv" target="_blank">vlucas/phpdotenv</a>
    package to define and manage your environment variables. I particularly recommend it.
</p>

### Using DBSocket

#### ConnectorRouter

<p>
    The package has an entity called <code>ConnectorRouter</code> that creates an instance of the connector based on the driver
    defined in the environment variables and using predefined options for each driver. It can be used in the following way:
</p>

![ConnectorRouter usage example.](./img/connectorrouter_dynamic_usage.png)

<p>
    If you prefer to manually configure the connector, you can do it as follows:
</p>

![ConnectorRouter config one at time.](./img/manual_connector_config.png)

<p>
    Or set the options all at once:
</p>

![ConnectorRouter config by options set.](./img/defining_options_via_array.png)

#### Single connectors

<p>
    If you prefer to use a specific connector without the <code>ConnectorRouter</code>, you can use the connectors individually.
</p>

#### MySQL

<p>
    To connect to MySQL use the <code>MysqlConnector</code> entity. Pay attention to the following variables:
</p>

<ul>
    <li>DB_HOST</li>
    <li>DB_PORT</li>
    <li>DB_NAME</li>
    <li>DB_CHARSET</li>
    <li>DB_USE_UNIX_SOCKET</li>
    <li>DB_USERNAME</li>
    <li>DB_PASSWORD</li>
</ul>

![MysqlConnector usage.](./img/mysqlconnector_example.png)

#### Sqlite

<p>
    To connect to MySQL use the <code>SqliteConnector</code> entity. Pay attention to the following variables:
</p>

<ul>
    <li>DB_NAME</li>
</ul>

<p>
    <b>Note: If you intend to use Sqlite's memory mode, set the <code>DB_NAME</code> to <code>':memory:'</code> instead of providing the database file path.</b>
</p>

![SqliteConnector usage.](./img/sqliteconnector_example.png)

#### Pgsql

<p>
    To connect to Pgsql use the <code>PgsqlConnector</code> entity. Pay attention to the following variables:
</p>

<ul>
    <li>DB_HOST</li>
    <li>DB_PORT</li>
    <li>DB_NAME</li>
    <li>DB_USE_UNIX_SOCKET</li>
    <li>DB_USERNAME</li>
    <li>DB_PASSWORD</li>
</ul>

![PgsqlConnector usage.](./img/pgsqlconnector_example.png)

### Updated at 2024/30/06 by Alan José.