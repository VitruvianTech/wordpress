#!/usr/bin/env bash

setup() {
  cp config/settings .env
  echo ""
  echo "WordPress initialization complete."
  echo ""
  echo "PLEASE EDIT the '.env' file to finish your setup!"
  echo ""
}

if [ -w .env  ]; then
  echo ""
  echo "Overwrite current settings?"
  echo ""
  echo "Press Y (Enter) to accept, or any key (Enter) to abort: "
  read ANSWER
  case $ANSWER in
    [yY]) echo "" && setup ;;
  esac
else
  setup
fi