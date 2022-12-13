.PHONY: run psql test help
.DEFAULT_GOAL := help

run: ## phpコンテナに入る
	docker-compose run -it --rm php /bin/sh

psql: ## psqlにログインする
	docker exec -it postgres psql

test: ## テストを実行する
	./vendor/bin/phpunit test/

help: ## ヘルプを表示する
	@echo "\e[32m▁▂▃▄▅▆▇▇▇▇\e[m 🐘PHP🐘 \e[32m▇▇▇▇▆▅▄▃▂▁\e[m"
	@grep -E '^[a-zA-Z_-_\/]+:.*?## .*$$' $(MAKEFILE_LIST) | \
		awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'
