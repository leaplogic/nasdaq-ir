# Nasdaq IR plugin for Craft CMS 3.x

Pull Nasdaq Stock & News from clientapi.gcs-web.com api endpoints.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require leaplogic/nasdaq-ir

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Nasdaq IR.

## Configuring Nasdaq IR

In the plugin setting you will need to add the URL endpoints for the `clientapi.gcs-web.com` api endpoints for both News & Stocks of a specific company.

## Using Nasdaq IR

### Example Stock Output
```TWIG
{% set stock = craft.nasdaqir.stock() %}
    {% if stock.Error is not defined and stock.data is defined and stock.data|length %}
        {% set quote = stock.data[0] %}
        <strong>NASDAQ {{ quote.symbol }}:</strong>
        <span>Price: ${{ quote.lastTrade|number_format(2, '.') }}</span>
        <span class="{{ quote.changeNumber >= 0 ? 'up' : 'down' }}">{{ quote.changeNumber|number_format(2, '.') }} ({{ (quote.changeNumber / quote.lastTrade * 100)|number_format(2)|abs }}%)</span>
    {% endif %}
{% endif %}
```

### Example News Output
```TWIG
{% set nasdaqIr = craft.nasdaqIr.fetch() %}
{% if nasdaqIr.Errors is not defined %}
    {% for news in nasdaqIr.data %}
        <div>
            <time datetime="01-01">{{ news.releaseDate.date|date('F d, Y') }}</time>
            {% set title = news.title|length > 80 ? news.title|slice(0, 80) ~ '&hellip;' : news.title %}

            {% set snippet = news.teaser %}
            {% set snippet = snippet|striptags|length > 250 ? snippet|striptags|slice(0, 250) ~ '&hellip;' : snippet %}

            <h2><a href="{{ news.link.hostedUrl }}">{{ title|raw }}</a></h2>
            <div class="snippet">
                {{ snippet|raw }}
            </div>
            <a href="{{ news.link.hostedUrl }}" class="more">Read More</a>
        </div>
    {% endfor %}
{% endif %}
```

## Nasdaq IR Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [Leap Logic](https://leaplogic.net)
