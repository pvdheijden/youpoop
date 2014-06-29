JSHINT = node_modules/.bin/jshint
MOCHA = node_modules/.bin/mocha --reporter spec

SOURCES = index.js $(wildcard lib/*.js) $(wildcard test/*.js)

jshint: $(SOURCES)
	$(JSHINT) $^

mocha:
	$(MOCHA)

test: jshint mocha

.PHONY: test